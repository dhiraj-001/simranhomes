    
/*====whats app integration js=======*/

$('.dfToggle').click(function() {
$('.nip').addClass('df-closed');
$('.nip').removeClass('df-btn-content');
$('.what').addClass('df-closed');
$('.what').removeClass('df-btn-text');
$('.nhat').addClass('df-btn-text');
$('.nhat').removeClass('df-closed');
})


$('.nhat').click(function() {
$('.nip').removeClass('df-closed');
$('.nip').addClass('df-btn-content');
$('.what').removeClass('df-closed');
$('.what').addClass('df-btn-text');
$('.nhat').removeClass('df-btn-text');
$('.nhat').addClass('df-closed');
});

function goToLink() {
window.location.href = `https://api.whatsapp.com/send/?phone=+919876543210&text=Hi!%20I'm%20Interested%20in%20properties%20Please%20Share%20Details.`;
}


const counters = document.querySelectorAll(".counter-value");

counters.forEach(counter => {
let initial_count = 0;
const final_count = counter.dataset.count;
// console.log(final_count);

let counting = setInterval(updateCounting, 40);

function updateCounting() {

if (initial_count < 1000) {
initial_count += 5;
counter.innerText = initial_count + '+';
}

if (initial_count >= 1000) {
initial_count += 100;
counter.innerText = (initial_count) + '+';
}

if (initial_count >= 10000) {
initial_count += 5000;
}

if (initial_count >= 1000000) {
initial_count += 500000;
counter.innerText = (initial_count / 1000000).toFixed(1) + 'M+';
}

if (initial_count >= final_count) {
clearInterval(counting);
}
}
})


/*====whats app integration js=======*/
    