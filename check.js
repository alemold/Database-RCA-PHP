function validateCF(codiceFiscale) {
    let res1 = /^(?:[A-Z][AEIOU][AEIOUX]|[AEIOU]X{2}|[B-DF-HJ-NP-TV-Z]{2}[A-Z]){2}(?:[\dLMNP-V]{2}(?:[A-EHLMPR-T](?:[04LQ][1-9MNP-V]|[15MR][\dLMNP-V]|[26NS][0-8LMNP-U])|[DHPS][37PT][0L]|[ACELMRT][37PT][01LM]|[AC-EHLMPR-T][26NS][9V])|(?:[02468LNQSU][048LQU]|[13579MPRTV][26NS])B[26NS][9V])(?:[A-MZ][1-9MNP-V][\dLMNP-V]{2}|[A-M][0L](?:[1-9MNP-V][\dLMNP-V]|[0L][1-9MNP-V]))[A-Z]$/i;
    if (codiceFiscale.match(res1)) {
        return true;
    } else {
        return false;
    }
}
function validateTarga(targa) {
    let res2 = /[A-Za-z]{2}[0-9]{3}[A-Za-z]{2}/g;
    if (targa.match(res2)) {
        return true;
    } else {
        return false;
    }
}

function invia() {
    var cfValue = document.getElementById("cf").value;
    let cfCheck = false;
    color = document.getElementById("cf");

    if (!validateCF(cfValue)) {
        document.getElementById("cfInvalid").innerHTML = "Codice Fiscale non valido.";
        color.style.background = "red";
    } else {
        cfCheck = true;
    }

    if (cfCheck == true) {
        return true;
    } else {
        return false;
    }

}


function validateSelect() {
    var select = document.getElementById("cfProp");
    var selectedValue = select.value;

    var targa = document.getElementById("targa");
    var valoreTarga = targa.value;

    let cfValid = false;
    let targaValid = false;

    if (selectedValue === "invalid") {
        document.getElementById("cfnotvalid").innerHTML = "Inserisci un codice fiscale";
        select.style.background = "red";
        cfValid = false;
    } else {
        document.getElementById("cfnotvalid").innerHTML = "";
        select.style.background = "";
        cfValid = true;
    }

    console.log(targa);
    if (!validateTarga(valoreTarga)) {
        document.getElementById("targaInvalida").innerHTML = "Targa non valida!";
        targa.style.background = "red";
        targaValid = false;
    } else {
        document.getElementById("targaInvalida").innerHTML = "";
        targa.style.background = "";
        targaValid = true;
    }

    if (cfValid == true && targaValid == true) {
        return true;
    } else {
        return false;
    }
}


function checkPassword() {
    var password1Field = document.getElementById("pass1");
    var password2Field = document.getElementById("pass2");
    var campoPass = document.getElementById("passDiversa");

    var password1 = password1Field.value;
    var password2 = password2Field.value;

    console.log(password1 + " " + password2);

    if (password1 == password2) {
        return true;
    } else {
        password1Field.style.background=("red");
        password2Field.style.background=("red");
        campoPass.innerHTML = "La password non corrisponde, riprovare!";
        return false;
    }
}