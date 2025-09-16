document.addEventListener('livewire:init', () => { 
    Livewire.on('alert', (event) => { 
        document.getElementById('successSound').play();
        var responseMsg = $('.alert_message') ;
        responseMsg.show().addClass(event.type).find('.text').text(event.message);
        responseMsg.find('audio').attr('autoplay', 'true');
        setTimeout(() => {
            responseMsg.hide().removeClass(event.type).find('.text').text(event.message) ;
        }, 4000);
    }); 
});
document.addEventListener('livewire:init', () => { 
    Livewire.on('changeMode', (event) => { 
        const modeType = localStorage.setItem("modeType", event.mode) ;
        updateModeClass(event.mode);    
    }); 
});
document.addEventListener('livewire:init', () => { 
    Livewire.on('setTimeout', (event) => { 
        setTimeout(() => {
            Livewire.dispatch("continue") ;
        }, event.time);
    }); 
});
document.addEventListener('livewire:init', () => { 
    Livewire.on('toggleFilter', (event) => { 
        const statusFilterBox = localStorage.getItem("filter") ;
        if (statusFilterBox == "active") {
            const filter = localStorage.setItem("filter", "") ;
            desactiveToggleFilter(); 
        }else{
            const filter = localStorage.setItem("filter", "active") ;
            activeToggleFilter(); 
        }    
    }); 
});
function updateModeClass(modeType) {
    const body = document.body ;
    const currentModeClass = body.classList.value.match(/dark_\d+/) ;
    if (currentModeClass) {
        $("body").removeClass(currentModeClass) ;
    }
    $("body").addClass("dark_"+modeType);
}
window.addEventListener("load", () => {
    const modeType = localStorage.getItem("modeType") ;
    if (modeType) {
        updateModeClass(modeType); 
    }
})
window.addEventListener("scroll", () => {
    // alert("hhhhhhhhhhh") ;
    // if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
    //     Livewire.dispatch("addLimit") ;
    // }
    
});

function reveal() {
    var reveals = document.querySelectorAll(".reveal");
    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}
window.addEventListener("scroll", reveal);
reveal();
// ===============================================================
// =====================================toggleFilterBox=================
$(".get-filter").click(function() {
    // const text = $(this).siblings(".text") ;
    const boxFilter = $(this).parents(".filter_wrapper");
    const iconFilterBody = $(this).parents(".filter_wrapper").find(".icon_card");
    const container = $(this).parents(".filter_wrapper").siblings(".container_cards");
    const itemsFilter = $(this).parents(".header_primary").siblings(".body_filter").find(".body_item_filter");

    boxFilter.toggleClass('active');
    container.toggleClass('active');
    // iconFilterBody.toggleClass('active');
    iconFilterBody.siblings(".text").toggle().toggleClass('m_auto');
    $(this).toggleClass('m_auto');
    itemsFilter.toggle() ;
})