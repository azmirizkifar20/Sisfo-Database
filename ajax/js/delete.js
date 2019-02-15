$(function () {
    $(".delete").click(function () {
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        if (confirm("Yakin ingin mengapus data ini?")) {
            $.ajax({
                type: "POST",
                url: "ajax/delete.php",
                data: info,
                success: function () {}
            });
            $(this).parents(".show").animate({
                    backgroundColor: "#003"
                }, "slow")
                .animate({
                    opacity: "hide"
                }, "slow");
        }
        return false;
    });
});