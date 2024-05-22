var myInput = document.getElementById("password-input"),
    letter = document.getElementById("pass-lower"),
    capital = document.getElementById("pass-upper"),
    number = document.getElementById("pass-number"),
    length = document.getElementById("pass-length");
(myInput.onfocus = function () {
    document.getElementById("password-contain").style.display = "block";
}),
    (myInput.onblur = function () {
        document.getElementById("password-contain").style.display = "none";
    }),
    (myInput.onkeyup = function () {
        myInput.value.match(/[a-z]/g)
            ? (letter.classList.remove("invalid"),
              letter.classList.add("valid"))
            : (letter.classList.remove("valid"),
              letter.classList.add("invalid")),
            myInput.value.match(/[A-Z]/g)
                ? (capital.classList.remove("invalid"),
                  capital.classList.add("valid"))
                : (capital.classList.remove("valid"),
                  capital.classList.add("invalid"));
        myInput.value.match(/[0-9]/g)
            ? (number.classList.remove("invalid"),
              number.classList.add("valid"))
            : (number.classList.remove("valid"),
              number.classList.add("invalid")),
            8 <= myInput.value.length
                ? (length.classList.remove("invalid"),
                  length.classList.add("valid"))
                : (length.classList.remove("valid"),
                  length.classList.add("invalid"));
    });

function editData(id) {

  console.log(id);
    
    var myInput = document.getElementById("password-input-" + id);
    var letter = document.getElementById("pass-lower-" + id);
    var capital = document.getElementById("pass-upper-" + id);
    var number = document.getElementById("pass-number-" + id);
    var length = document.getElementById("pass-length-" + id);
    (myInput.onfocus = function () {
        document.getElementById("password-contain-" + id).style.display =
            "block";
    }),
        (myInput.onblur = function () {
            document.getElementById("password-contain-" + id).style.display =
                "none";
        }),
        (myInput.onkeyup = function () {
            myInput.value.match(/[a-z]/g)
                ? (letter.classList.remove("invalid"),
                  letter.classList.add("valid"))
                : (letter.classList.remove("valid"),
                  letter.classList.add("invalid")),
                myInput.value.match(/[A-Z]/g)
                    ? (capital.classList.remove("invalid"),
                      capital.classList.add("valid"))
                    : (capital.classList.remove("valid"),
                      capital.classList.add("invalid"));
            myInput.value.match(/[0-9]/g)
                ? (number.classList.remove("invalid"),
                  number.classList.add("valid"))
                : (number.classList.remove("valid"),
                  number.classList.add("invalid")),
                8 <= myInput.value.length
                    ? (length.classList.remove("invalid"),
                      length.classList.add("valid"))
                    : (length.classList.remove("valid"),
                      length.classList.add("invalid"));
        });

    console.log(myInput);
}