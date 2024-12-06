import './bootstrap';

const runMetricForm = document.querySelector('#run-metric-form');
const metricsContainer = document.querySelector('#metrics');

runMetricForm.addEventListener('submit', async (event) => {
    event.preventDefault();
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
            htmlContent += `<p>${item.title}: ${item.score}</p>`;
        });

        metricsContainer.innerHTML = htmlContent;

    } catch (error) {
        console.error('Error:', error);
    }
});