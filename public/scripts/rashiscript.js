const getVal=(st)=>{
    return document.querySelector(st).innerHTML;
}
var apires=null;
var year=getVal("#year");
var month=getVal("#mnth");
var date=getVal("#date");
var hour=getVal("#hour");
var min=getVal("#min");
var sec=getVal("#sec");

let data = {
    year: parseInt(year),
    month: parseInt(month),
    date: parseInt(date),
    hours: parseInt(hour),
    minutes: parseInt(min),
    seconds: parseInt(sec),
    latitude: 13.3409,
    longitude: 74.7421,
    timezone: 5.5,
    config: {
        observation_point: "topocentric",
        ayanamsha: "lahiri"
    }
};
let jsonData = JSON.stringify(data);
const myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");
const requestOptions = {
  method: "POST",
  headers: myHeaders,
  body: jsonData,
  redirect: "follow"
};

fetch("http://127.0.0.1:8000/proxy/planets/extended", requestOptions)
  .then((response) => response.json())
  .then((result) => {apires=result;proc(apires);})
  .catch((error) => console.error('Error:', error));

  const proc=(apires)=>{
    console.log(apires);
    document.querySelector("#userZod").innerHTML+=getZod("zodiac_sign_name");
    zodList=document.querySelectorAll(".zodDets");
    zodList[0].innerHTML+=getZod("zodiac_sign_name");
    zodList[1].innerHTML+=getZod("nakshatra_name");
    zodList[2].innerHTML+=getZod("zodiac_sign_lord");
    zodList[3].innerHTML+=getZod("nakshatra_vimsottari_lord");
    zodList[4].innerHTML+=getZod("nakshatra_number");
    zodList[5].innerHTML+=getZod("house_number");
    zodList[6].innerHTML+=getZod("nakshatra_pada");
    zodList[7].innerHTML+=getZod("current_sign");

  }

  const getZod=(id)=>{
    return " "+apires['output']['Moon'][id];
  }

  const hidePL=()=>{
    setTimeout(()=>{document.querySelector("#preloader").style.display="none";},2000)
  }

  const dload=()=>{
    var content = document.querySelector('#rashiresult').innerText;
    var blob = new Blob([content], { type: 'text/plain' });
    var link = document.createElement('a');
    link.href = window.URL.createObjectURL(blob);
    link.download = 'rashi_report.txt';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }