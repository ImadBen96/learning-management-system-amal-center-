class Podcast extends HTMLElement {

    constructor( ) {

        // Always call super first in constructor
        super();
        //
        //
        const shadow = this.attachShadow({mode: 'open'});

        // Create spans
        const player = document.createElement('div');
        player.setAttribute('class', 'player');
        //need to append player after
        //cover player child
        const cover = document.createElement('div')
        cover.setAttribute('class' , 'cover')
        let coverSrc = this.hasAttribute('coverSrc') ? this.getAttribute('coverSrc') : ''
        const img = document.createElement('img')
        img.setAttribute('src' , coverSrc)
        cover.appendChild(img)
        //info is player child
        const info = document.createElement('div')
        info.setAttribute('class' , 'info')
        const title = document.createElement('div')
        title.setAttribute('class' , 'title')
        title.innerText = 'أمال بودكاست'
        info.appendChild(title)
        //volume-box player child
        const volume_box = document.createElement('div')
        volume_box.setAttribute('class' , 'volume-box')
        const span = document.createElement('span')
        span.setAttribute('class' , 'volume-down')
        const icon = document.createElement('i')
        icon.setAttribute('class' , 'material-icons')
        span.appendChild(icon)
        const input = document.createElement('input')
        input.setAttribute('type' , 'range')
        input.setAttribute('class' , 'volume-range')
        input.setAttribute('step' , '1')
        input.setAttribute('value' , '80')
        input.setAttribute('min' , '0')
        input.setAttribute('max' , '100')
        const span1 = document.createElement('span')
        span1.setAttribute('class' , 'volume-up')
        const icon1 = document.createElement('i')
        icon1.setAttribute('class' , 'material-icons')
        span1.appendChild(icon1)
        volume_box.appendChild(span )
        volume_box.appendChild(input)
        volume_box.appendChild(span1)
  //btn-box
        const btn_box = document.createElement('div')
        btn_box.setAttribute('class' , 'btn-box')
        const icon2 = document.createElement('i')
        icon2.setAttribute('class' , 'material-icons repeat')
        const img1 = document.createElement('img')
        img1.src = this.hasAttribute('logo') ? this.getAttribute('logo') : ''
        img1.setAttribute('class' , 'favorite')
        img1.setAttribute('height' , '70px')
        img1.setAttribute('width' , '70px')
        const icon3 = document.createElement('i')
        icon3.setAttribute('class' , 'material-icons volume')
        btn_box.appendChild(icon2)
        btn_box.appendChild(img1)
        btn_box.appendChild(icon3)
        //music-box player child
        const music_box = document.createElement('div')
        music_box.setAttribute('class', 'music-box')
        const input1 = document.createElement('input')
        input1.setAttribute('type' , 'range')
        input1.setAttribute('class' , 'seekbar')
        input1.setAttribute('step' , '1')
        input1.setAttribute('value' , '0')
        input1.setAttribute('min' , '0')
        input1.setAttribute('max' , '100')
        //audio with source as child
        const audio = document.createElement('audio')
        audio.setAttribute('class' , 'music_element')
        // the source
       const source = document.createElement('source')
        source.setAttribute('src' , this.hasAttribute('podcastSrc') ? this.getAttribute('podcastSrc') : '')
        source.setAttribute('type' , 'audio/mp3')
        audio.appendChild(source)
        const span2 = document.createElement("span")
        span2.setAttribute('class' , 'current-time')
        span2.innerText = '0:0'
        const span3 = document.createElement("span")
        span3.setAttribute('class' , 'duration')
        span3.innerText = '0:0'
        const a = document.createElement('a')
        a.setAttribute('class' , 'play')
        const icon4 = document.createElement('i')
        icon4.setAttribute('class' , 'material-icons ')
        icon4.innerText = '▶️'
        a.appendChild(icon4)
        music_box.appendChild(input1)
        music_box.appendChild(audio)
        music_box.appendChild(span2)
        music_box.appendChild(span3)
        music_box.appendChild(a)
        //close icon
        const img3 = document.createElement('img')
        img3.src = 'http://localhost:8000/assets/close/close.svg'
        img3.height = '32'
        img3.width = '32'
        const close = document.createElement('a')
        close.setAttribute('class' , 'closeBtn')
        close.appendChild(img3)
        const element = this
        close.onclick = function (){
            element.remove()
        }
        const style = document.createElement('style')
        style.textContent = `
        .player {
        // position: absolute;
        // left: 50%;
        // top: 50%;
        // transform: translate(-50%, -50%);
        width: 330px;
        height: 395px;
        border-radius: 15px;
        background-color: #18113c;
        box-shadow: 0 15px 20px 0 #c58371;
        z-index: 14;
    }
    .player input[type=range] {
        -webkit-appearance: none !important;
        margin: 0px;
        padding: 0px;
        background: #f2eae4;
        height: 5px;
        width: 150px;
        outline: none;
        cursor: pointer;
        overflow: hidden;
        border-radius: 5px;
    }
    .player input[type=range]::-ms-fill-lower {
        background: #f2eae4;
    }
    .player input[type=range]::-ms-fill-upper {
        background: #f2eae4;
    }
    .player input[type=range]::-moz-range-track {
        border: none;
        background: #f2eae4;
    }
    .player input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none !important;
        background: #ff3677;
        height: 5px;
        width: 5px;
        border-radius: 50%;
        box-shadow: -100vw 0 0 100vw #f7d9b9;
    }
    .player input[type=range]::-moz-range-thumb {
        background: #ff3677;
        height: 8px;
        width: 8px;
        border-radius: 100%;
    }
    .player input[type=range]::-ms-thumb {
        -webkit-appearance: none !important;
        background: #ff3677;
        height: 8px;
        width: 8px;
        border-radius: 100%;
    }
    .player .cover {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        left: 50%;
        top: 35px;
        transform: translateX(-50%);
        box-shadow: 0 5px 20px 0 #d56c006d;
    }
    .player .cover img {
        width: 104%;
        height: 106%;
        object-fit: cover;
    }
    .player .info {
        position: absolute;
        left: 50%;
        top: 212px;
        transform: translateX(-50%);
        text-align: center;
    }
    .favorite{
        transform: translateY(-25px);
    }
    .player .info .title {
        font-size: 20px;
        font-weight: 700;
        color: #faee35;
        margin-bottom: 2px;
    }
    .player .info .singer {
        font-size: 12px;
        color: #faee35;
    }
    .player .btn-box {
        position: absolute;
        top: 261px;
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .player .btn-box i {
        font-size: 24px;
        color: #72646f;
        margin: 0 30px;
        cursor: pointer;
    }
    .player .btn-box i.active {
        color: #ff3677;
    }
    .player .volume-box {
        display: none;
        position: absolute;
        left: 50%;
        top: 295px;
        transform: translateX(-50%);
        z-index: 20;
        padding: 0 20px;
    }
    .player .volume-box .volume-down {
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #72646f;
    }
    .player .volume-box .volume-up {
        position: absolute;
        right: -15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #72646f;
    }
    .player .volume-box .volume-up::selection {
        background-color: unset;
    }
    .player .volume-box input[type=range] {
        height: 5px;
        width: 150px;
        margin: 0 0 15px 0;
    }
    .player .volume-box.active {
        display: block;
    }
    .player .music-box {
        position: absolute;
        left: 50%;
        top: 290px;
        transform: translateX(-50%);
    }
    .player .music-box input[type=range] {
        height: 5px;
        width: 230px;
        margin: 0 0 10px 0;
    }
    .player .music-box input[type=range]::-webkit-slider-thumb {
        height: 5px;
        width: 7px;
    }
    .player .music-box .current-time {
        position: absolute;
        left: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #faee35;
    }
    .player .music-box .duration {
        position: absolute;
        right: -35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #faee35;
    }
    .player .music-box .play,
    .player .music-box .pause {
        position: absolute;
        display: block;
        left: 50%;
        top: 55px;
        transform: translateX(-50%);
        width: 50px;
        height: 50px;
        border-radius: 50px;
        background-color: #18113c;
        cursor: pointer;
        transition: all 0.4s;
    }
    .player .music-box .play i,
    .player .music-box .pause i {
        font-size: 36px;
        color: #72646f;
        position: absolute;
        left: 50%;
        top: 40%;
        transform: translate(-48%, -50%);
    }
    .player .music-box .pause i {
        font-size: 32px;
        transform: translate(-50%, -50%);
    }
    .player .music-box .play, .player .music-box .pause {
        top: 42px;
    }
    .closeBtn{
    position : relative;
    top : 0%;
    right : 0%;
    }
        `
        shadow.appendChild(style);
        console.log(style.isConnected);
        shadow.appendChild(player)
        player.appendChild(cover)
        player.appendChild(info)
        player.appendChild(volume_box)
        player.appendChild(btn_box)
        player.appendChild(music_box)
        player.appendChild(close)



    }
    connectedCallback() {
        console.log('Custom square element added to page.');
        let  music = document.querySelector('podcast-amal').shadowRoot.querySelector('.music_element')
        let playBtn = document.querySelector('podcast-amal').shadowRoot.querySelector('.play')
        let seekbar = document.querySelector('podcast-amal').shadowRoot.querySelector('.seekbar')
        let currentTime = document.querySelector('podcast-amal').shadowRoot.querySelector('.current-time')
        let duration = document.querySelector('podcast-amal').shadowRoot.querySelector('.duration')
        let volIcon =  document.querySelector('podcast-amal').shadowRoot.querySelector('.volume')
        let volBox = document.querySelector('podcast-amal').shadowRoot.querySelector('.volume-box')
        let volumeRange = document.querySelector('podcast-amal').shadowRoot.querySelector('.volume-range')
        let volumeDown = document.querySelector('podcast-amal').shadowRoot.querySelector('.volume-down')
        let volumeUp = document.querySelector('podcast-amal').shadowRoot.querySelector('.volume-up')
        console.log('%cplayer', 'background : green')

        console.log(music.length + ' the music component')
        console.log(playBtn.length + ' the play component')
        console.log(seekbar.length + ' the seekbar component')
        console.log(currentTime.length + ' the currentTime component')
        console.log(duration.length + ' the duration component')
        console.dir(playBtn)

        console.log('inside the handle play')


        music.onloadeddata = function () {
            seekbar.max = music.duration
            var ds = parseInt(music.duration % 60)
            var dm = parseInt((music.duration / 60) % 60)
            duration.innerHTML = dm + ':' + ds
        }
        music.ontimeupdate = function () { seekbar.value = music.currentTime }
        let  handleSeekBar = function () { music.currentTime = seekbar.value }
        music.addEventListener('timeupdate', function () {
            var cs = parseInt(music.currentTime % 60)
            var cm = parseInt((music.currentTime / 60) % 60)
            currentTime.innerHTML = cm + ':' + cs
        }, false)

        // like
        var favIcon = document.querySelector('podcast-amal').shadowRoot.querySelector('.favorite')
        console.log(favIcon.length + ' favIvcon length')

        function handleFavorite() {
            favIcon.classList.toggle('active');
        }

// repeat
        var repIcon = document.querySelector('podcast-amal').shadowRoot.querySelector('.repeat')
        console.log(repIcon.length + ' repIcon length')
        function handleRepeat() {
            if (music.loop == true) {
                music.loop = false
                repIcon.classList.toggle('active')
            }
            else {
                music.loop = true
                repIcon.classList.toggle('active')
            }
        }
        repIcon.addEventListener('click' , handleRepeat)

        // volume

        console.log(volIcon.length+  ' valIcon lenght')
        console.log(volBox.length+  ' valIcon lenght')
        console.log(volumeRange.length+  ' valIcon lenght')
        console.log(volumeDown.length+  ' valIcon lenght')
        console.log(volumeUp.length+  ' valIcon lenght')
        volumeRange.addEventListener('input' , function () {
            music.volume = value/100
        })
        function handleVolume() {
            volIcon.classList.toggle('active')
            volBox.classList.toggle('active')
        }

        function handleVolumeDown() {
            volumeRange.value = Number(volumeRange.value) - 20
            music.volume = volumeRange.value / 100
        }
        function handleVolumeUp() {
            volumeRange.value = Number(volumeRange.value) + 20
            music.volume = volumeRange.value / 100
        }
        volIcon.addEventListener('click' , handleVolume)
        volumeDown.addEventListener('click', handleVolumeDown);
        volumeUp.addEventListener('click', handleVolumeUp);
        let handlePlay =  function  () {
            if (music.paused) {
                music.play();
                playBtn.className = 'pause'
                playBtn.innerHTML = '<i class="material-icons">⏹️</i>'
            } else {
                music.pause();
                playBtn.className = 'play'
                playBtn.innerHTML = '<i class="material-icons">▶️</i>'
            }
            music.addEventListener('ended', function () {
                playBtn.className = 'play'
                playBtn.innerHTML = '<i class="material-icons">▶️</i>'
                music.currentTime = 0
            });
        }
        playBtn.onclick = handlePlay
        //destroy the element
    }


}
customElements.define('podcast-amal', Podcast);
