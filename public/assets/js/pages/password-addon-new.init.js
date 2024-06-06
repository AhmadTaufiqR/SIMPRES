// Array.from(document.querySelectorAll("form .auth-pass-inputgroup")).forEach(
//     function (e) {
//         Array.from(e.querySelectorAll(".password-addon")).forEach(function (r) {
//             r.addEventListener("click", function (r) {
//                 var o = e.querySelector(".id-password");
//                 "password" === o.type
//                     ? (o.type = "text")
//                     : (o.type = "password");
//             });
//         });
//     }
// );

document.querySelector('.id-password').forEach(input => {
    input.addEventListener('keyup', function() {
        var id = this.dataset.id;

        Array.from(document.querySelectorAll("form .auth-pass-inputgroup")).forEach(
            function (e) {
                Array.from(e.querySelectorAll(".password-addon-new")).forEach(function (r) {
                    r.addEventListener("click", function (r) {
                        var o = e.querySelector(".id-password-".id);
                        "password" === o.type
                            ? (o.type = "text")
                            : (o.type = "password");
                    });
                });
            }
        );
    });
});