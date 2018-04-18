const axios = require('axios');


function postData (id)
{
    let validationPath = document.getElementById(this.id+'-validation');

    axios.post(validationPath.dataset.path, {input: this.value})
        .then(function(response) {
            if (response.data.valid) {
                validationPath.innerText = ":)";
            } else {
                validationPath.innerText = ":(";
            }
        })
        .catch(function (error) {
            validationPath.innerText = 'Error: ' + error;
        });
}


document.getElementById('name').onkeyup = postData;
document.getElementById('team').onkeyup = postData;