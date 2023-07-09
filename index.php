<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche RDV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">RDV CAPAGO</h2>
                    <div id="available-appointement" class="col-12 m-6 text-center" style="margin-top: 100px; margin-bottom: 100px;"></div>
                       
                    </p>
                    <button class="btn btn-primary col-12" id="search-appointment">Chercher</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="content" style="visibility: hidden">
        <?=file_get_contents("https://visa-fr-gn.capago.eu/WebSite_getUnavailableDayList?capago_center_id=capago_CNK&formula=premium&visa_file_list=[{%22resource_id%22:%2220190517-37FC1%22,%22variation_id%22:%226%22}]&travel_project_relative_url=undefined");?>
    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const container = document.querySelector("#search-appointment");
        container.addEventListener("click", event => {
            document.querySelector("#available-appointement").innerHTML=`
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`;

            fetch("request.php")
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    let html = '<p class="text-danger"><strong>Aucun RDV disponible 🥹!</strong></p>'
                    if (data.available_day_list && data.available_day_list.length) {
                        html = '<p class="text-succees">Yes des RDV ✅ </p>'
                        html += '<ul>';

                        data.available_day_list.forEach(day => {
                            html += `<li>${day}</li>`
                        })
                        
                        html +=  '</ul>';
                    }
                    const appointementDom = document.querySelector("#available-appointement");
                    appointementDom.innerHTML = html;
                })
                .catch(function(error) {
                    console.error(error);
                });
           
            
        });

        container.click()
    </script>
</body>
</html>