import MenuItem from "../menu/menu-item"
import { SOCIAL_LINKS } from "./constants"
import { cn } from "@/types/cn"

function SocialLinks({ className }: { className?: string }) {
  return (
    <ul className={cn('flex gap-4', className)}>
      {/* {SOCIAL_LINKS.map((link) => (
        <MenuItem key={link.name} to={link} />
      ))} */}
    </ul>
  )
}

export default SocialLinks
