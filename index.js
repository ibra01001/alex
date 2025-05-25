
anime({
    targets: '.box',
    translateX: [0],
    

    rotate: '0turn',
    scale: [1],
    opacity: [1,1],
    duration: 2000,
    delay: 0,
    endDelay: 300,
    loop: 0,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});
anime({
    targets: '.just',
    translateX: [100, -5],
    rotate: '0turn',
    scale: [1],
    opacity: [0, 1],
    duration: 5000,
    delay: 10,
    endDelay: 300,
    loop: 0,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});
anime({
    targets: '. rounded-circle',
    translateX: [0, 0],
    rotate: '1turn',
    scale: [1.2],
    opacity: [0,0,1],
    duration: 3000,
    delay: 0,
    endDelay: 300,
    loop: 0,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});
anime({
    targets: '.title',
    translateX: [100, 0],
    rotate: '0turn',
    scale: [1],
    opacity: [0, 1],
    duration: 1000,
    delay: 0,
    endDelay: 300,
    loop: 0,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});
anime({
    targets: '.letter',
    opacity: [0, 0, 1],
    keyframes: [
        { translateX: '-100%', easing: 'easeOutExpo', duration: 60 },
        { translateX: 10, easing: 'easeOutBounce', duration: 800, delay: 0 }
    ],
    rotate: {
        value: '0turn',
        delay: 0
    },
    delay: anime.stagger(50),
    easing: 'easeInOutCirc',
    loop: 0,
    loopDelay: 0
});
anime({
    targets: '.title2',
    translateX: [0, 50, 100, 60],
    translateY: [50, 50],
    rotate: '0turn',
    scale: [0.5, 1, 2, 1.2, 1],
    opacity: [0, 1],
    duration: 1000,
    delay: 0,
    endDelay: 300,
    loop: 0,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});






document.getElementById('aboutme').addEventListener('click', showtheAboutMe);

function showtheAboutMe() {
    const abtm = document.getElementById('ABOUTME');
    abtm.classList.remove('d-none');
    abtm.innerHTML = ''; // Clear before adding

    const text = document.createElement('div');
    text.classList.add('about-box');

    text.innerHTML = `
        <button class="close-btn" onclick="closeAboutMe()">&times;</button>
        <p class="des">Hi, I'm Ibrahim — a passionate aspiring web developer. I've learned HTML, CSS, PHP, JavaScript, and Bootstrap, and I'm currently learning MySQL. I'm also planning to dive deeper into modern frameworks like React and Laravel. I love building dynamic, responsive websites and enjoy turning ideas into interactive web experiences. Let’s connect!</p>
    `;

    abtm.appendChild(text);

    anime({
        targets: '.des',
        scale: [0.9, 1],
        opacity: [0, 1],
        duration: 1500,
        easing: 'easeOutExpo'
    });
}

function closeAboutMe() {
    const abtm = document.getElementById('ABOUTME');
    anime({
        targets: '.about-box',
        opacity: [1, 0],
        duration: 800,
        easing: 'easeInOutExpo',
        complete: () => {
            abtm.classList.add('d-none');
            abtm.innerHTML = '';
        }
    });
}





/*const showtheSCROLLDOWN = () => {
    let scrl = document.getElementById('scrolldown')
    scrl.innerHTML = '';
    let text = document.createElement('div')
   
    text.innerHTML = ` <section class="mb-5">
    <div class="text-center mb-4">
      <h2 class="display-5 fw-semibold">Languages</h2>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 justify-content-center">
      <!-- JavaScript -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/javascript-logo-svgrepo-com.svg" alt="JavaScript" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">JavaScript</p>
      </div>
      
      <!-- PHP -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/php-svgrepo-com.svg" alt="PHP" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">PHP</p>
      </div>
      
      <!-- MySQL -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/mysql-logo-svgrepo-com.svg" alt="MySQL" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">MySQL</p>
      </div>
      
      <!-- HTML -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/html-svgrepo-com.svg" alt="HTML" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">HTML</p>
      </div>
      
      <!-- CSS -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/css-3-svgrepo-com.svg" alt="CSS" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">CSS</p>
      </div>
    </div>
  </section>

  <!-- Frameworks Section -->
  <section class="mb-5">
    <div class="text-center mb-4">
      <h2 class="display-5 fw-semibold">Frameworks</h2>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-4 justify-content-center">
      <!-- React -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/react-svgrepo-com.svg" alt="React" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">React</p>
      </div>
      
      <!-- Bootstrap -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/bootstrap-svgrepo-com.svg" alt="Bootstrap" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">Bootstrap</p>
      </div>
      
      <!-- Laravel -->
      <div class="col text-center">
        <img src="./alexanderIMAGES/laravel-svgrepo-com.svg" alt="Laravel" class="skill-icon img-fluid mb-2">
        <p class="mb-0 skill-title">Laravel</p>
      </div>
    </div>
  </section>


`
    scrl.appendChild(text)

    requestAnimationFrame(() => {
        animateScrollDown();
    });
};
*/



//function animateScrollDown() {



  window.addEventListener('DOMContentLoaded', () => {
    anime({
      targets: '.skill-icon',
      rotate: '1turn',
      scale: [0.5, 1],
      opacity: [0, 1],
      duration: 1500,
      delay: anime.stagger(100),
      easing: 'easeInOutExpo'
    });
  });








const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            showtheSCROLLDOWN();
            observer.unobserve(entry.target);
        }
    });
}, {
    threshold: 1
});

observer.observe(document.querySelector('.observer-target'))




/*
const noteinfo =()=>{
    let nt = document.getElementById("note")
    nt.innerHTML=""
    let text= document.createElement("p")
    text.className = "noteC";
    text.innerHTML = "scroll dwon"
    nt.appendChild(text)



}
noteinfo()

    function changenote(){
    if(document.querySelector('.timer')){
        let nt= document.getElementById('note')
        nt.innerHTML=""
        let text= document.createElement('p')
        text.className = "noteC"
        text.innerHTML = "END"
        nt.appendChild(text)
        
    }

}

    <div class="scroll-section padded">
      <div class="large centered row">
        <pre class="large log row">
          <span id='indice' class="label">Timer</span>
          <span class="timer value lcd">0</span>
        </pre>
      </div>
    </div>


const noteOBS= new IntersectionObserver((entries)=>{
    entries.forEach(entry => {
        if(entry.isIntersecting){
            changenote()
            noteOBS.unobserve(entry.target)
        }
    })
},{
    threshold:1
})
noteOBS.observe(document.querySelector(".timer"))
*/