// https://gsap.com/docs/v3/

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
    const sections = gsap.utils.toArray("main > section:not(.Home)");

    sections.forEach(section => {
        gsap.from(section, {
            y: 100,
            autoAlpha: 0,
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
                trigger: section,
                start: "top 80%",
                once: true
                // markers: true, 
            }
        });
    });

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".BeelinkStat",
            start: "top 80%",
            toggleActions: "play none none none",
            once: true
        }
    });

    gsap.utils.toArray(".counter").forEach(span => {
        const target = span.dataset.target;
        const prefix = span.dataset.prefix || "";
        const suffix = span.dataset.suffix || "";

        let proxy = { val: 0 };

        tl.to(proxy, {
            val: target,
            duration: 2.5,
            ease: "power3.out",

            onUpdate: () => {
                span.textContent = prefix + Math.round(proxy.val) + suffix;
            }
        }, 0);
    });

    tl.from(".static-value", {
        autoAlpha: 0,
        y: 20,
        duration: 1.5,
        ease: "power2.inOut"
    }, 0.5);

});