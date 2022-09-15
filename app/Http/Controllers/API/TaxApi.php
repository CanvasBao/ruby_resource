<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use App\Models\MstTaxRule;

class TaxApi extends ApiController
{
    /**
     * git tax active now
     *
     * @return \Illuminate\Http\Response
     */
    public function getTax(){
        $tax = (new MstTaxRule)->getTaxNow();

        return $this->response->data(['tax_rate' => $tax])->success();
    }

    /**
     * get tax list
     *
     * @return \Illuminate\Http\Response
     */
    public function getList(){
        $list = MstTaxRule::query()
        ->leftJoin('mst_tax_rule as tax_active', function($join)
        {
            $now = date('Y-m-d');
            $maxQuery = "(select max(apply_date) from mst_tax_rule where apply_date <= '{$now}' AND deleted_at IS NULL)";
            $join->on('tax_active.id', '=', 'mst_tax_rule.id');
            $join->on('tax_active.apply_date', '=', DB::raw($maxQuery));
            $join->whereNull('tax_active.deleted_at');
        })
        ->select([
            DB::raw("(CASE WHEN IFNULL(tax_active.id, 0) = 0 THEN 0
                        ELSE 1 END) AS active_tax"),
            'tax_active.id as testid',
            'mst_tax_rule.id',
            'mst_tax_rule.tax_rate',
            'mst_tax_rule.apply_date',
            'mst_tax_rule.created_at',
        ])
        ->orderBy('mst_tax_rule.apply_date', 'DESC')
        ->get();

        return $this->response->data($list->toArray())->success();
    }

    /**
     * create new tax
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
        $input = $request->all();

        $validatorInput = [
            'tax_rate' => 'required|numeric',
            'apply_date' => 'required|date|after:yesterday',
        ];
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }
        DB::beginTransaction();
        try {
            $registerInput = [
                'tax_rate' => $input['tax_rate'],
                'apply_date' => $input['apply_date'],
            ];

            MstTaxRule::create($registerInput);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->rollback();
        }

        return $this->response->registed();
    }

    /**
     *　delete tax
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            if($id == 1){
                return $this->response->error('削除できません。');
            }

            $taxRule = MstTaxRule::where('id', '=', $id)->first();
            if ($taxRule === null) {
                return $this->response->error('税率が存在しません。');
            }

            $taxRule->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->rollback();
        }

        return $this->response->registed();
    }

}
