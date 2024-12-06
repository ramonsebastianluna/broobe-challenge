import './bootstrap';

const runMetricForm = document.querySelector('#run-metric-form');
const saveMetricForm = document.querySelector('#save-metric-form');
const metricsContainer = document.querySelector('#metrics');
const btnSubmitMetrics = document.querySelector('#submit-metrics');

runMetricForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    btnSubmitMetrics.innerHTML = '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>'
    btnSubmitMetrics.disabled = true;
    
    const formData = new FormData(runMetricForm);

    const selectedCategories = [];
    runMetricForm.querySelectorAll('input[name="categories[]"]:checked').forEach(checkbox => {
        selectedCategories.push(checkbox.value);
    });

    const formObject = {
        url: formData.get('url'),
        strategy: formData.get('strategy'),
        categories: selectedCategories
    };
    
    try {
        const response = await fetch('/', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formObject)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        let serverResponse = await response.json();
        console.log('Datos asignados:', serverResponse);

        let htmlContent = '';
        serverResponse.forEach(item => {
            htmlContent += `<div class="card my-2">
                                <div class="card-body">
                                    <p class="card-text m-0">${item.title}</p>
                                    <p class="card-text m-0">${item.score}</p>
                                </div>
                            </div>`;
        });

        metricsContainer.innerHTML = htmlContent;

    } catch (error) {
        console.error('Error:', error);
    }

    btnSubmitMetrics.innerText = 'GET METRICS'
    btnSubmitMetrics.disabled = false;
});

saveMetricForm.addEventListener('submit', (event) => {
    event.preventDefault();
    alert('Oh! This button is not implemented yet!');
});