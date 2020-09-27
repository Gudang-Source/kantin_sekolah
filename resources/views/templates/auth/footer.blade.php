</body>
<script>
    function showPass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<!-- Jquery JS-->
<script src="{{ url('assets/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ url('assets/vendor/animsition/animsition.min.js') }}"></script>
<!-- Main JS-->
<script src="{{ url('assets/js/main.js') }}"></script>

</html>