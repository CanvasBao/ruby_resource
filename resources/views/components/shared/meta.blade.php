<title>{{ $title }}</title>
<meta property="description" content="{{ $description }}" />

<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:type" content="{{ $type }}" />
<meta property="og:site_name" content="{{ $siteName }}" />
<meta property="og:url" content="{{ $url }}" />
<meta property="og:image" content="{{ $image }}" />
<meta property="og:locale" content="{{ $locale }}" />
<meta name="csrf_token" value="{{ csrf_token() }}"/>
<meta name="caffeinated" content="false">

{{ $slot }}
