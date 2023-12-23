(function ($) {
    "use strict";
    var HT = {};

    HT.seoPrivew = () => {
        $('input[name=meta_title').on('keyup', function () {
            let input = $(this)
            let value = input.val()
            $('.meta-title').html(value)
        })
        $('input[name=canonical]').css({
            'padding-left': parseInt($('.baseUrl').outerWidth()) + 10
        })
        $('input[name=canonical').on('keyup', function () {
            let input = $(this)
            let value = HT.slug(input.val())
            $('.canonical').html(BASE_URL + value + SUFFIX)
        })
        $('textarea[name=meta_description').on('keyup', function () {
            let input = $(this)
            let value = input.val()
            $('.meta-description').html(value)
        })
    }

    HT.slug = (str) => {
        //Đổi chữ hoa thành chữ thường
        str = str.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        str = str.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        str = str.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        str = str.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        str = str.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        str = str.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        str = str.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        str = str.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        str = str.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        str = str.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        str = str.replace(/\-\-\-\-\-/gi, '-');
        str = str.replace(/\-\-\-\-/gi, '-');
        str = str.replace(/\-\-\-/gi, '-');
        str = str.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        return str;
    }

    $(document).ready(function () {
        HT.seoPrivew();
    });
})(jQuery);
