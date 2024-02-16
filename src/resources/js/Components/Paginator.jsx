import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/react/20/solid'

export default function Paginator(props) {
    const {next_page_url, previous_page_url, from, to, total, links} = props.pageData

    return (
        <div className="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 dark:bg-gray-800">
            <div className="flex flex-1 justify-between sm:hidden">
                <a
                    href={previous_page_url}
                    className="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-900 hover:bg-gray-50 "
                >
                    Previous
                </a>
                <a
                    href={next_page_url}
                    className="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >
                    Next
                </a>
            </div>
            <div className="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between ">
                <div>
                    <p className="text-sm text-gray-700 dark:text-gray-400">
                        Showing <span className="font-medium">{from}</span> to <span
                        className="font-medium">{to}</span> of{' '}
                        <span className="font-medium">{total}</span> results
                    </p>
                </div>
                <div>

                    <nav className="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        {links.map((link, key) => {
                            return (
                                <a
                                    href={link.url}
                                    key={key}
                                    aria-current="page"
                                    className={link.active ?
                                        "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        : "text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"}
                                >
                                    <div className="content" dangerouslySetInnerHTML={{__html: link.label}}></div>
                                </a>
                            )
                        })}
                    </nav>
                </div>
            </div>
        </div>
    )
}
