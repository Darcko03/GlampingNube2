// booking-form.js
function calcularTotales() {
    // Obtener el precio del domo seleccionado
    const domoSelect = document.getElementById('dome');
    const selectedDomePrice = parseFloat(domoSelect.options[domoSelect.selectedIndex].getAttribute('data-price')) || 0;

    // Obtener la fecha de inicio y fecha de fin
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    // Calcular la cantidad de días en el rango de fechas
    const oneDay = 24 * 60 * 60 * 1000; // 1 día en milisegundos
    const daysInRango = Math.round(Math.abs((startDate - endDate) / oneDay)) + 1; // +1 para incluir el día de inicio

    // Calcular el precio total del domo por los días en el rango
    const totalDomePrice = selectedDomePrice * daysInRango;

    // Obtener los precios de los servicios seleccionados
    const serviceCheckboxes = document.querySelectorAll('input[name="services[]"]:checked');
    let selectedServicesPrice = 0;
    serviceCheckboxes.forEach(checkbox => {
        selectedServicesPrice += parseFloat(checkbox.getAttribute('data-price')) || 0;
    });

    // Calcular el subtotal
    const subtotal = totalDomePrice + selectedServicesPrice;

    // Obtener el valor del descuento seleccionado
    const offerSelect = document.getElementById('offer');
    const selectedOfferValue = parseFloat(offerSelect.options[offerSelect.selectedIndex].value) || 0;

    // Aplicar el descuento al subtotal
    const subtotalAfterDiscount = subtotal - selectedOfferValue;

    // Calcular el tax (10% del subtotal después del descuento)
    const tax = subtotalAfterDiscount * 0.10;

    // Calcular el total (subtotal después del descuento + tax)
    const total = subtotalAfterDiscount + tax;

    // Actualizar los campos de subtotal, tax y total
    const subtotalField = document.getElementById('subtotal');
    const taxField = document.getElementById('tax');
    const totalField = document.getElementById('total');

    subtotalField.value = subtotalAfterDiscount.toFixed(2); // Ajusta la cantidad de decimales según necesites
    taxField.value = tax.toFixed(2); // Ajusta la cantidad de decimales según necesites
    totalField.value = total.toFixed(2); // Ajusta la cantidad de decimales según necesites
}

// Agregar eventos change a los elementos relevantes para calcular los totales en tiempo real
const domoSelect = document.getElementById('dome');
domoSelect.addEventListener('change', calcularTotales);

const serviceCheckboxes = document.querySelectorAll('input[name="services[]"]');
serviceCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', calcularTotales);
});

const offerSelect = document.getElementById('offer');
offerSelect.addEventListener('change', calcularTotales);

// Agregar eventos change a los campos de fecha de inicio y fecha de fin para recalcular los totales cuando cambian
const startDateInput = document.getElementById('start_date');
startDateInput.addEventListener('change', function () {
    verificarReservaExistente();
    calcularTotales();
});

const endDateInput = document.getElementById('end_date');
endDateInput.addEventListener('change', function () {
    verificarReservaExistente();
    calcularTotales();
});

// Función para verificar si ya existe una reserva en el rango de fechas
function verificarReservaExistente() {
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);
    const selectedDomeId = domoSelect.value;

    // Realiza una lógica aquí para verificar si ya existe una reserva en el rango de fechas
    // y con el domo seleccionado. Si existe una reserva, debes deshabilitar las fechas o mostrar un mensaje de error.
    // Puedes hacer esto mediante una llamada AJAX al servidor para verificar las reservas existentes en la base de datos.
}

// Calcular los totales iniciales al cargar la página
calcularTotales();

function verificarReservaExistente() {
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);
    const selectedDomeId = domoSelect.value;

    fetch(`/verificar-reserva?dome_id=${selectedDomeId}&start_date=${startDate.toISOString()}&end_date=${endDate.toISOString()}`)
        .then(response => response.json())
        .then(data => {
            if (data.reservado) {
                alert('Este rango de fechas ya está reservado para el domo seleccionado. Por favor, elige otro.');
                startDateInput.value = ''; // Limpiar las fechas
                endDateInput.value = '';
            }
        })
        .catch(error => {
            console.error('Error al verificar la reserva:', error);
        });
}

