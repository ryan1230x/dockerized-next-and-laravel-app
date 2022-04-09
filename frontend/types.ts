import { CSSProperties, MouseEvent, ReactElement, ReactNode } from "react"
import { NextPage } from "next"
import { AppProps } from "next/dist/shared/lib/router/router"

export type Children = { children?: ReactNode }
export type ClassName = { className?: string }
export type CSS = { style?: CSSProperties }

export type NextPageWithLayout = NextPage & {
  getLayout?: (page: ReactElement) => ReactNode
}

export type AppPropsWithLayout = AppProps & {
  Component: NextPageWithLayout
}

export type SideBarMenuType = {} & Children
