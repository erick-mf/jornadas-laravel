document.addEventListener('DOMContentLoaded', function() {
    const eventoSelect = document.getElementById('evento_id');
    const diaEvento = document.getElementById('dia_evento');
    const horaEvento = document.getElementById('hora_evento');
    const cupoDisponible = document.getElementById('cupo_disponible');

    if (!eventoSelect || !diaEvento || !horaEvento || !cupoDisponible) {
        console.error('Uno o más elementos no fueron encontrados');
        return;
    }

    function actualizarInformacionEvento() {
        const selectedOption = eventoSelect.options[eventoSelect.selectedIndex];
        diaEvento.value = selectedOption.dataset.dia;
        horaEvento.value = `${selectedOption.dataset.horaInicio} - ${selectedOption.dataset.horaFinal}`;
        cupoDisponible.value = selectedOption.dataset.cupo;
    }

    eventoSelect.addEventListener('change', actualizarInformacionEvento);

    actualizarInformacionEvento();
});
