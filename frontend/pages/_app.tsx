import { ReactElement } from "react"
import "../styles/vendor.scss"
import "../styles/app.scss"
import { AppPropsWithLayout } from "../types"
import { ReactQueryDevtools } from "react-query/devtools"
import { QueryClientProvider, QueryClient } from "react-query"

const queryClient = new QueryClient()

function MyApp({ Component, pageProps }: AppPropsWithLayout) {
  const getLayout = Component.getLayout ?? ((page: ReactElement) => page)
  return getLayout(
    <QueryClientProvider client={queryClient}>
      <Component {...pageProps} />
      {/* <ReactQueryDevtools initialIsOpen={false} /> */}
    </QueryClientProvider>
  )
}

export default MyApp
