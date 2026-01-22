// https://gsap.com/docs/v3/
gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
    const loader = document.querySelector("#loader");
    const loaderBg = document.querySelector("#loader-bg");
    const loaderBee = document.querySelector("#loader-bee");
    const loaderText = document.querySelector("#loader-text");

    // Sequential Icons
    const icon1 = document.querySelector("#loader-icon-1"); // 3 Hex
    const icon2 = document.querySelector("#loader-icon-2"); // Honey
    const icon3 = document.querySelector("#loader-icon-3"); // Data
    const icon4 = document.querySelector("#loader-icon-4"); // Beekeeper

    // Home Elements
    const homeTitle = document.querySelector(".Content .Gauche h1");
    const homeText = document.querySelector(".Content .Gauche p");
    const homeButtons = document.querySelector(".Content .Boutons");
    const homeImage = document.querySelector(".Content .Droite img");
    const homeArrow = document.querySelector(".Arrow");
    const homeHeroItems = document.querySelectorAll(".HomeHero div");

    if (loader && loaderBg && loaderBee && loaderText) {
        // 1. Prepare Text
        const textContent = loaderText.textContent;
        loaderText.innerHTML = textContent.split("").map(char => `<span>${char}</span>`).join("");
        const chars = loaderText.querySelectorAll("span");

        // 2. Initial States
        gsap.set(loaderBg, { scale: 0 });
        gsap.set(loaderBee, { scale: 0, opacity: 0, rotation: 180 });
        gsap.set(loaderText, { opacity: 1 });

        gsap.set(chars, { yPercent: 100, opacity: 0 });

        // 3. Home Elements Initial State
        // 3. Home Elements Initial State
        const homeElements = [homeTitle, homeText, homeButtons];
        gsap.set(homeElements, { y: 30, opacity: 0 });
        gsap.set(homeArrow, { yPercent: 150, opacity: 0 }); // Start lower, respecting % based transform
        gsap.set(homeImage, { x: 30, opacity: 0 });
        gsap.set(homeImage, { x: 30, opacity: 0 });
        gsap.set(homeHeroItems, { y: 30, opacity: 0 });

        // Icon States (Slide Up Setup)
        const icons = [icon1, icon2, icon3, icon4];
        icons.forEach(icon => {
            if (icon) gsap.set(icon, { y: 50, opacity: 0, scale: 0.8 });
        });

        const loaderTl = gsap.timeline({
            onComplete: () => {
                gsap.to(loader, {
                    yPercent: -100,
                    duration: 1,
                    ease: "power2.inOut",
                    onComplete: () => {
                        loader.style.display = "none";
                        ScrollTrigger.refresh();

                        // Trigger Home Animation after loader is gone
                        const homeTl = gsap.timeline();

                        homeTl.to(homeTitle, { y: 0, opacity: 1, duration: 0.8, ease: "power3.out" }, "+=0.1")
                            .to(homeText, { y: 0, opacity: 1, duration: 0.8, ease: "power3.out" }, "-=0.6")
                            .to(homeButtons, { y: 0, opacity: 1, duration: 0.8, ease: "power3.out" }, "-=0.6")
                            .to(homeImage, { x: 0, opacity: 1, duration: 1, ease: "power3.out" }, "-=0.8")
                            .to(homeArrow, { yPercent: 50, opacity: 1, duration: 0.8, ease: "back.out(1.7)", clearProps: "transform" }, "-=0.6")
                            .to(homeHeroItems, {
                                y: 0,
                                opacity: 1,
                                duration: 0.8,
                                stagger: 0.1,
                                ease: "power3.out"
                            }, "-=0.6");
                    }
                });
            }
        });

        loaderTl
            // STEP 1: Ignition (Yellow Circle)
            .to(loaderBg, {
                scale: 60,
                duration: 1.2,
                ease: "expo.inOut"
            })

            // STEP 2: Icon 1 (3 Hex) - Structure
            .to(icon1, {
                y: 0,
                scale: 1,
                opacity: 1,
                duration: 0.4,
                ease: "back.out(1.2)"
            })
            .to(icon1, {
                y: -50,
                opacity: 0,
                duration: 0.3,
                ease: "power2.in"
            }, "+=0.3")

            // STEP 3: Icon 2 (Honey) - Production
            .to(icon2, {
                y: 0,
                scale: 1,
                opacity: 1,
                duration: 0.4,
                ease: "back.out(1.2)"
            }, "-=0.1")
            .to(icon2, {
                y: -50,
                opacity: 0,
                duration: 0.3,
                ease: "power2.in"
            }, "+=0.3")

            // STEP 4: Icon 3 (Data) - Analysis
            .to(icon3, {
                y: 0,
                scale: 1,
                opacity: 1,
                duration: 0.4,
                ease: "back.out(1.2)"
            }, "-=0.1")
            .to(icon3, {
                y: -50,
                opacity: 0,
                duration: 0.3,
                ease: "power2.in"
            }, "+=0.3")

            // STEP 5: Icon 4 (Beekeeper) - Human
            .to(icon4, {
                y: 0,
                scale: 1,
                opacity: 1,
                duration: 0.4,
                ease: "back.out(1.2)"
            }, "-=0.1")
            .to(icon4, {
                y: -50,
                opacity: 0,
                duration: 0.3,
                ease: "power2.in"
            }, "+=0.3")

            // FINAL STEP: Logo Reveal
            .to(loaderBee, {
                rotation: 0,
                scale: 1,
                opacity: 1,
                duration: 0.6,
                ease: "back.out(1.7)"
            }, "-=0.2")

            // Text Reveal
            .to(chars, {
                yPercent: 0,
                opacity: 1,
                stagger: 0.05,
                duration: 0.6,
                ease: "power4.out"
            }, "-=0.4")

            .to({}, { duration: 0.6 });
    }

    // Existing site animations
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