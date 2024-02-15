$(document).ready(function () {
    $("form#violate").submit(function (event) {
        var form = document.getElementById("violate");
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/violate",
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: response.mess,
                    timer: 5000,
                    showConfirmButton: true,
                    allowOutsideClick: false
                });
                console.log(response);
                $('#exampleModal').modal('hide');
                form.reset();
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
    // Xử lí cái rating
    var rating_num = $("#rating_num").val();
    $("#rateYo").rateYo({
        rating: rating_num,
    }).on("rateyo.set", function (e, data) {
        // if (isSettingRating) {
        //     return;
        // }
        // Check đã đăng nhập chưa
        // if ($("#rating-check").val() == 0) {
        //     alert('Vui lòng đăng nhập để đánh giá!');
        //     return;
        // }
        // Cập nhật giá trị vào input
        $("#rating_value").val(data.rating);
        // alert("Bạn đã đánh giá " + data.rating + "!");
        // submit vào db
        $.ajax({
            type: "POST",
            url: "/rating",
            data: {
                rating_value: data.rating,
                story_id: $("#story_id").val()
                // user_id: $("#user_id").val()
            },
            success: function (response) {
                console.log(response.mess);
                $("#rating_value_num").html(response.rating_num);
                $("#total_rating").html(response.total_rating);
                alert("Bạn đã đánh giá " + data.rating + "!");
            },
            error : function(response){
                alert(response.mess)
            },
            
        });
    });
    // Hiện popup thông báo trang chapter

    var popup = localStorage.getItem('isDetailPage');
    console.log(popup);
    function showChapterModal() {
        document.getElementById('overlay').style.display = 'block';
        $("#popup_alert_chapter").modal('show');
        localStorage.setItem('popupShown', 'true');
        // Đặt timeout mới sau 1 ngày (24 giờ) 24 * 60 * 60 * 1000
        // setTimeout(function () {
        //     localStorage.removeItem('popupShown');
        // }, 10000);
        // setTimeout(function () {
        //     localStorage.removeItem('isDetailPage');
        // }, 10000);

    }

    // Kiểm tra xem đã hiển thị popup trước đó chưa
    if (!localStorage.getItem('popupShown')) {
        if (popup) {
            // Nếu chưa, thì sau 3 giây hiển thị popup
            setTimeout(showChapterModal, 3000);
        }
    }
    // Reset trạng thái popup về ban đầu sau 24h
    setTimeout(function () {
        localStorage.clear();
    }, 24 * 60 * 60 * 1000);

    $('#popup_alert_chapter').on('hidden.bs.modal', function () {
        document.getElementById('overlay').style.display = 'none';
    });
    // localStorage.clear();
    // setTimeout(localStorage.clear(), 86400000);
    // Hiện popup quyền lợi tác giả
    document.getElementById('popup_author').addEventListener('click', function () {
        document.getElementById('overlay').style.display = 'block';
        $("#author_rights").modal('show')
    });
    $('#author_rights').on('hidden.bs.modal', function () {
        document.getElementById('overlay').style.display = 'none';
    });
});
