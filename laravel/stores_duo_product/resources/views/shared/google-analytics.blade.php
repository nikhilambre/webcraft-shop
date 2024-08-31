<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $_ENV['GOOGLE_ANALYTICS_CODE'] }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ $_ENV['GOOGLE_ANALYTICS_CODE'] }}');
</script>
