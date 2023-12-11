const { forEach } = require('lodash');

window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * custom onload
 */
window.onload = () => {
    // handel click open/close toggle
    for (let toggle of document.querySelectorAll('.toggleSection .toggleItem')){
        let openBth = toggle.getElementsByClassName("toggleItemButton")[0];
        if(!openBth){
            openBth = toggle.getElementsByClassName("toggleItemHeader")[0];
        }

        if(!openBth) continue

        openBth.addEventListener('click', (e) => {
            if(toggle.classList.contains('isOpened')){
                toggle.classList.remove('isOpened')
            }else{
                toggle.classList.add('isOpened')
            }
        })
    }
}