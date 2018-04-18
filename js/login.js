$(document).ready(function () {

    // Lyssna på klick på knappen button
    $("#logga_in").on("click", function (event) {

        // Slå på HTML5 formulärvalidering
        if ($("#login")[0].checkValidity()) {

            // Hindra formuläret att skicka via POST
            event.preventDefault();

            // Läser av det som skrivits in
            var user = $("#user").val();
            var password = $("#password").val();

            // Skicka ett ajax-meddelande
            $.ajax({
                url: "login.php",
                method: "POST",
                data: {
                    anamn: user,
                    losen: password
                },
                success: function (data) {
                    console.log (data);
                    if (data == "Ja") {
                        $("#fel").text("Inloggning ok!");
                        window.location = "min_sida.php";
                    } else {
                        $("#fel").text("Fel användarnamn eller lösenord!");
                    }
                }

            });
        }
    });
});
