import { cn } from "@/types/cn";
import { ReactNode, useRef, useEffect } from "react";
import ScrollReveal from "scrollreveal";
import { Link } from "@inertiajs/react";
import { PageProp } from "@/types";

type ScrollRevealRefElement =
    | HTMLDivElement
    | HTMLHeadingElement
    | HTMLParagraphElement;

function Hero({
    auth,
    className,
    content,
    illustration,
    title,
    }: PageProp<{
    className?: string;
    content: string;
    illustration?: ReactNode;
    title: string;
}>) {
    const scrollRevealRef = useRef<ScrollRevealRefElement[]>([]);

    useEffect(() => {
        if (scrollRevealRef.current.length > 0) {
            scrollRevealRef.current.map((ref) =>
                ScrollReveal().reveal(ref, {
                    duration: 1000,
                    distance: "40px",
                    easing: "cubic-bezier(0.5, -0.01, 0, 1.005)",
                    origin: "top",
                    interval: 150,
                }),
            );
        }

        return () => ScrollReveal().destroy();
    }, []);

    function onNewsletterSubmit(values: any) {
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve({ values });
            }, 1000);
        });
    }

    const addToScrollRevealRef = (el: ScrollRevealRefElement) => {
        scrollRevealRef.current.push(el);
    };

    return (
        <section
            className={cn(
                "text-center lg:w-full lg:py-20 lg:text-left",
                className,
            )}
        >
            <div className="hero mx-auto w-full max-w-6xl px-6">
                <div className="hero-inner relative lg:flex">
                    <div className="hero-copy pb-16 pt-10 lg:min-w-[40rem] lg:pr-20 lg:pt-16">
                        <div className="mx-auto w-full max-w-3xl">
                            <h1
                                className="mb-4 mt-0 text-4xl font-bold md:text-5xl "
                                ref={addToScrollRevealRef}
                            >
                                {title}
                            </h1>
                            <p
                                className="prose prose-xl m-auto text-gray-500"
                                ref={addToScrollRevealRef}
                            >
                                {content}
                            </p>
                        </div>

                        <div ref={addToScrollRevealRef}>
                         

                            <nav className="mx-auto mt-8 max-w-md lg:mx-0 -mx-3 flex flex-1 justify-end">
                                {auth.user ? (
                                    <Link
                                        href={route("dashboard1")}
                                        className=" mr-2 -mt-px inline-flex cursor-pointer justify-center whitespace-nowrap rounded-sm border-0 bg-gradient-to-r from-secondary-500 to-primary-400 px-7 py-4 text-center font-medium leading-4 text-white no-underline shadow-lg"
                                    >
                                        Dashboard
                                    </Link>
                                ) : (
                                    <>
                                        <Link
                                            href={route("login")}
                                            className=" mr-2 -mt-px inline-flex cursor-pointer justify-center whitespace-nowrap rounded-sm border-0 bg-gradient-to-r from-secondary-500 to-secondary-400 px-7 py-4 text-center font-medium leading-4 text-white no-underline shadow-lg"
                                        >
                                            Log in
                                        </Link>
                                        <Link
                                            href={route("register")}
                                            className=" mr-2 -mt-px inline-flex cursor-pointer justify-center whitespace-nowrap rounded-sm border-0 bg-gradient-to-r from-secondary-500 to-primary-400 px-7 py-4 text-center font-medium leading-4 text-white no-underline shadow-lg"
                                        >
                                            Register
                                        </Link>
                                    </>
                                )}
                            </nav>
                        </div>
                    </div>

                    {!!illustration && (
                        <div className="relative -mx-6 py-10 lg:mx-0 lg:p-0">
                            {illustration}
                        </div>
                    )}
                </div>
            </div>
        </section>
    );
}

export default Hero;
