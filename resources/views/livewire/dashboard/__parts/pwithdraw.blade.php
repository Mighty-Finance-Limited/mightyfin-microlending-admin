<div class="w-full">
    <!-- Snippet -->
    <section class="flex flex-col justify-center antialiased bg-gray-200 text-gray-600 p-4">
        <div class="">
            <!-- Card -->
            <div class="max-w-[360px] mx-auto">
                <div class="bg-white shadow-lg rounded-lg mt-9">
                    <!-- Card header -->
                    <header class="text-center px-5 pb-5">
                        <!-- Avatar -->
                        <img width="20" class="inline-flex -mt-9 w-[72px] h-[72px] fill-current rounded-full border-4 border-white box-content shadow mb-3" src="{{ asset('public/mfs/images/j.png') }}">
                        
                        <!-- Card name -->
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Withdraw Funds.</h3>
                        <div class="text-sm font-medium text-gray-500">WFN #00224</div>
                    </header>
                    <!-- Card body -->
                    <div class="bg-gray-100 text-center px-5 py-6">
                        <div class="text-sm mb-6"><strong class="font-semibold">K2,000.00</strong></div>
                        <form class="space-y-3">
                            <div class="flex shadow-sm rounded">
                                <div class="flex-grow">
                                    <input name="card-nr" class="text-sm text-gray-800 bg-white rounded-l leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="Card Number" aria-label="Card Number" />
                                </div>
                                <div class="flex-none w-[4.8rem]">
                                    <input name="card-expiry" class="text-sm text-gray-800 bg-white leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="MM/YY" aria-label="Expiration" />
                                </div>
                                <div class="flex-none w-[3.5rem]">
                                    <input name="card-cvc" class="text-sm text-gray-800 bg-white rounded-r leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="CVC" aria-label="CVC" />
                                </div>
                            </div>
                            <button type="submit" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- More components -->
    {{-- <div x-show="open" class="fixed bottom-0 right-0 w-full md:bottom-8 md:right-12 md:w-auto z-60" x-data="{ open: true }">
        <div class="bg-gray-800 text-gray-50 text-sm p-3 md:rounded shadow-lg flex justify-between">
            <div>👉 <a class="hover:underline ml-1" href="https://cruip.com/?ref=codepen-cruip-snippet-14" target="_blank">More components on Cruip.com</a></div>
            <button class="text-gray-500 hover:text-gray-400 ml-5" @click="open = false">
                <span class="sr-only">Close</span>
                <svg class="w-4 h-4 flex-shrink-0 fill-current" viewBox="0 0 16 16">
                    <path d="M12.72 3.293a1 1 0 00-1.415 0L8.012 6.586 4.72 3.293a1 1 0 00-1.414 1.414L6.598 8l-3.293 3.293a1 1 0 101.414 1.414l3.293-3.293 3.293 3.293a1 1 0 001.414-1.414L9.426 8l3.293-3.293a1 1 0 000-1.414z" />
                </svg>
            </button>
        </div>
    </div> --}}
    </div>