var app =   angular.module("app",[]);


app.controller("controlador",function($scope){
    var equipos = this;

    equipos.ProximosEncuentros = [

        {ligaid : 1, encuentroid: 1, nombreEquipo: 'equipo 1', emblema : 'prueba.jpg', diaSemana : 'Viernes', diaConMes : '2 Agosto', hora : '20:00 PM'},
        {ligaid : 1, encuentroid: 1, nombreEquipo: 'equipo 2', emblema : 'prueba2.jpeg', diaSemana : 'Viernes',  diaConMes : '2 Agosto', hora : '20:00 PM'}

    ];

    equipos.ShowEncuentros = true;

    equipos.ShowProximosEncuentros = function()
    {
        equipos.ShowEncuentros = !equipos.ShowEncuentros;
    }

    equipos.CerrarSesion = function()
    {
        window.location.href = "http://www.w3schools.com";
    }
});