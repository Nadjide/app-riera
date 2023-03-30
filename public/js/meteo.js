
let querycitycountry = document.getElementById('querycitycountry');
let weatherData = document.getElementById('weatherData');
let generateBtn = document.querySelector('#mybutton');

generateBtn.addEventListener('click', fetchData);

function fetchData() {
let url =`https://api.openweathermap.org/data/2.5/weather?q=${querycitycountry.value}&appid=3dc80e1a6297d8cfbdb512ba91b15485`;
console.log(querycitycountry.value)
console.log(url)
fetch(url)
.then(function (response) {
if (response.status !== 200) {
    console.log(
    'Looks like there was a problem. Status Code: ' + response.status
    );
    return;
}
response.json().then(function (data) {
    console.log(data);
    const celsius = (data.main.temp - 273.15).toFixed(2);
    weatherData.innerHTML = `
    <h2>${data.name}, ${data.sys.country}</h2>
    <p>Temperature: ${celsius} °C</p>
    `
    if (celsius<=10){
        weatherData.innerHTML  +=`
        <p>Description : Pense a prendre une veste !</p>
        `
    }else if(celsius>=10 && celsius<20){
        weatherData.innerHTML  +=`
        <p>Description : Prend toi une tenue décontracte ! </p>
        `
    }
     else if(celsius>=20){
        weatherData.innerHTML  +=`
        <p>Description : Organise toi une après-midi plage ! </p>
        `
     }
});
})
.catch(function (err) {
console.log('Fetch Error :-S', err);
});

}

