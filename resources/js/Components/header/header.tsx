import { Link } from "@inertiajs/react"
import { Logo } from "../logo"


function Header({ title }: { title?: string }) {
  return (
    <header className="relative py-6">
      <div className="mx-auto w-full max-w-6xl px-6">
        <div className="relative flex items-center justify-between">
          <h1 className="m-0 text-xl font-bold uppercase leading-none">
            <Link href="/" className="flex items-center gap-2 no-underline">
              <Logo />
              <span>{title}</span>
            </Link>
          </h1>
        </div>
      </div>
    </header>
  )
}

export default Header
