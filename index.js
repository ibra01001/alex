
anime({
    targets: '.box',
    translateX: 0,
    rotate: '0turn',
    scale: [0.5, 1, 3, 1.5, 3],
    opacity: [0, 1],
    duration: 3000,
    delay: 0,
    endDelay: 300,
    loop: 0,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});
anime({
    targets: '.simon',
    translateX: [0],
    rotate: '1turn',
    scale: [0.5, 1],
    opacity: [0, 1],
    duration: 1000,
    delay: 0,
    endDelay: 300,
    loop: 3,
    direction: 'alternate',
    easing: 'easeInOutExpo',

});
anime({
    targets: '.letter',
    opacity: [0, 1],
    keyframes: [
        { translateY: '-100%', easing: 'easeOutExpo', duration: 600 },
        { translateY: 10, easing: 'easeOutBounce', duration: 800, delay: 200 }
    ],
    rotate: {
        value: '-1turn',
        delay: 0
    },
    delay: anime.stagger(50),
    easing: 'easeInOutCirc',
    loop: 1,
    loopDelay: 1000
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
anime({
    targets: '.title3',
    translateX: [-0, -50, -100, -55],
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
    let abtm = document.getElementById('ABOUTME')
    abtm.innerHTML = '';
    let text = document.createElement('div')
    text.className = 'divabtm';

    text.innerHTML = `<h1 class="Aboutme" style="color:black;">ALEXANDER</h1>
<p class ="des" style="color:black;">Hi, I'm Ibrahim, a passionate web developer with expertise in JavaScript (React), PHP, Laravel, MySQL, HTML, CSS, and Bootstrap. I specialize in building dynamic, responsive websites and web applications using modern technologies. Whether it's frontend magic with React or robust backend solutions with Laravel, I love turning ideas into reality. Let's connect!
</p>`;
    abtm.appendChild(text)


    anime({
        targets: '.Aboutme',
        translateX: [50],
        translateY: [1000, -100],
        rotate: '0turn',
        scale: [1, 2, 1],
        opacity: [0, 1],
        duration: 2000,
        delay: 0,
        endDelay: 300,
        loop: 0,
        direction: 'alternate',
        easing: 'easeInOutExpo',
    });
    anime({
        targets: '.des',
        translateX: [50],
        translateY: [-100, -100],
        rotate: '0turn',
        scale: [1, 1, 1],
        opacity: [0, 1],
        duration: 2000,
        delay: 0,
        endDelay: 300,
        loop: 0,
        direction: 'alternate',
        easing: 'easeInOutExpo',
    });

}


document.getElementById('proj').addEventListener('click', showthePROJECTS);

function showthePROJECTS() {
    let prj = document.getElementById('PROJ')
    let temps = document.getElementById('temp')
    temps.style.background = 'none';
    prj.innerHTML = '';
    let text = document.createElement('div')
    text.className = "prjclass"
    text.innerHTML = `<h1 class="prj" style="color:black;">some projects</h1>
     <div class="prj1" style="color:black;"><p id="prg">Working on an e commerce web site right now.</p><a href=" "target="_blank">Coming soon😁</a>`
    prj.appendChild(text)
    anime({
        targets: '.prj',
        translateX: [-50],
        translateY: [1000, 50],
        rotate: '0turn',
        scale: [1, 2, 1],
        opacity: [0, 1],
        duration: 2000,
        delay: 0,
        endDelay: 300,
        loop: 0,
        direction: 'alternate',
        easing: 'easeInOutExpo',



    });
    anime({
        targets: '.prj1',
        translateX: [0],
        translateY: [0, -100],
        rotate: '0turn',
        scale: [1, 2, 1],
        opacity: [0, 1],
        duration: 2000,
        delay: 0,
        endDelay: 300,
        loop: 0,
        direction: 'alternate',
        easing: 'easeInOutExpo',
    });
}


const showtheSCROLLDOWN = () => {
    let scrl = document.getElementById('scrolldown')
    scrl.innerHTML = '';
    let text = document.createElement('div')
    text.className = "scrolldown"
    text.innerHTML = `<div class="scroll-container scroll-y">
  <div class="scroll-content grid square-grid">
    <div class="scroll-section padded">
      <div class="large centered row">
        <div class="label"><h1>Skills</h1></div>
      </div>
    </div>
    <div class="scroll-section padded">
      <div class="large row">
      <div class="lng" id="JS">
        <img class="l" id="js" style="position:relative; left:30vw !important;" src="./alexanderIMAGES/javascript-logo-svgrepo-com.svg" width=90;>
        <div class="Lang">javascript</div>
        </div>
        <div class="lng" id="PHP">
        <img class="l" id="php"style="position:relative; left:28.6vw !important;" src="./alexanderIMAGES/php-svgrepo-com.svg" width=100>
        <div class="Lang">PHP</div>
        </div>
        <div class="lng" id="MSQL">
        <img class="l" id="msql" src="./alexanderIMAGES/mysql-logo-svgrepo-com.svg" width=100>
        <div class="Lang">MySQL</div>
        </div>
        <div class="lng" id="HTML">
        <img class="l" id="html"  src="./alexanderIMAGES/html-svgrepo-com.svg" width=100>
        <div class="Lang">HTML</div>
        </div>
        <div class="lng" id="CSS">
        <img class="l" style="position:relative; left:28.6vw !important;" id="css" src="./alexanderIMAGES/css-3-svgrepo-com.svg" width=100>
        <div class="Lang">CSS</div>
        </div>

      </div>
    </div>
    <div class="scroll-section padded">
      <div class="large centered row">
        <pre class="large log row">
          <span id='indice' class="label">Timer</span>
          <span class="timer value lcd">0</span>
        </pre>
      </div>
    </div>
    <div class="scroll-section padded">
      <div class="large row">
        <div class="rct" id="RCT">
        <img id="react" class="frm" src="./alexanderIMAGES/react-svgrepo-com.svg" width=120>
        <div class="frams">react</div>
        </div>
        <div class="rct" id="LRVL">
        <img id="laravel" class="frm" src="./alexanderIMAGES/laravel-svgrepo-com.svg" width=190>
        <div class="frams">Laravel</div>
        </div>
        <div class="rct" id="BOOT">
        <img id="bootstrap" class="frm" src="./alexanderIMAGES/bootstrap-svgrepo-com.svg" width=100>
        <div class="frams">Bootstrap</div>
        </div>


      </div>
    </div>
  </div>
</div>
`
    scrl.appendChild(text)

    requestAnimationFrame(() => {
        animateScrollDown();
    });
};




function animateScrollDown() {
    anime({
        targets: '.Lang',
        translateX: [-1000,0],
        translateY: [0,0,100],
        rotate: '0turn',
        duration: 2000,
        direction: 'normal',
        loop: 1,
        opacity: [0, 1],
        easing: 'easeInOutExpo'
    });
        anime({
        targets: '.l',
        translateX: [-1000,0],
        translateY: [0,0,100],
        rotate: '0turn',
        duration: 2000,
        direction: 'normal',
        loop: 1,
        opacity: [0, 1],
        easing: 'easeInOutExpo'
    });
    

    anime({
        targets: '.frams',
        translateX: [100, 0],
        duration: 1500,
        scale: [1, 1.2, 1],
        delay: anime.stagger(200),
        direction: 'alternate',
        loop: 1,
        opacity: [0, 1, 0],
        easing: 'easeInOutExpo'
    });
    anime({
        targets: '.frm',
        translateX: [100, 0],
        scale: [1, 1.2, 1],
        duration: 1500,
        delay: anime.stagger(200),
        direction: 'alternate',
        loop: 1,
        opacity: [0, 1, 0],
        easing: 'easeInOutExpo'
    });



    let $timer = document.querySelector('.timer');
    let start = 0;
    let duration = 2000;
    let step = duration / 100;
    let interval = setInterval(() => {
        if (start >= 100) {
            clearInterval(interval);
        } else {
            $timer.textContent = start++;
        }
    }, step);
}

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


const audio = document.getElementById('audio');
audio.volume = 0
audio.pause();

Draggable.create("#controller", {
  type: "x",
  bounds: { minX: -250, maxX: 250 },
  
    onDrag: function() {
        audio.play();
        const x = this.x;
        
        const volume = (x + 250) / 500;
        audio.volume = volume;
    }

});

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