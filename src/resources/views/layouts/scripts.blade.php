<script type="text/javascript">
    var text = '<?=Auth::user()->username?>';
    var body = document.getElementById('watermarked');
    var bg = "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' version='1.1' height='100px' width='100px'>" +
        "<text transform='translate(20, 100) rotate(-45)' fill='rgb(211,211,211)' font-size='20' >" + text + "</text></svg>\")";
    body.style.backgroundImage = bg
</script>