<script>
    $('html').ready(function () {
        const type = "<?php echo $_SESSION['type']; ?>";
        const codUser = "<?php echo $_SESSION['codUser']; ?>";
        $("#default").click(function () {
            $("#defaultScreen").removeClass("hidden");
            $("#adminScreen").addClass("hidden");
            $("#superScreen").addClass("hidden");

            $("#default").addClass("active");
            $("#admin").removeClass("active");
            $("#super").removeClass("active");
        });
        if (type > 1) {
            $("#admin").click(function () {
                $("#defaultScreen").addClass("hidden");
                $("#adminScreen").removeClass("hidden");
                $("#superScreen").addClass("hidden");

                $("#default").removeClass("active");
                $("#admin").addClass("active");
                $("#super").removeClass("active");
            });
        }
        if (type > 2) {
            $("#super").click(function () {
                $("#defaultScreen").addClass("hidden");
                $("#adminScreen").addClass("hidden");
                $("#superScreen").removeClass("hidden");

                $("#default").removeClass("active");
                $("#admin").removeClass("active");
                $("#super").addClass("active");
            });
        }
    });
</script>