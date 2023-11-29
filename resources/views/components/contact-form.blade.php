<section class="my-20">
    <div class="flex flex-col items-center justify-center px-6 mx-auto">
        <div class="w-full rounded-lg dark:border md:mt-0 sm:max-w-4xl xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div>
                <h2 class="text-4xl tracking-tight font-extrabold text-center text-gray-700 dark:text-white heading">
                    Contact
                </h2>
                <hr class="w-48 h-0.5 mx-auto my-4 bg-[#BF1B2C] border-0 rounded">
                <p class="text-center text-gray-500 dark:text-gray-400 text-lg">
                    Have feedback or suggestions? Share your thoughts!
                </p>
                @if( Session::has( 'success' ))
                    <div class="p-4 mt-10 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                         role="alert">
                        {{ Session::get( 'success' ) }}
                    </div>
                @endif
                <form method="post" action="{{route('contact-us')}}" class="mt-10 space-y-8 border border-gray-100 shadow bg-gray-50 p-10 rounded-lg">

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Your email
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               maxlength="190"
                               class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                               placeholder="name@company.com" required>
                        @if($errors->has('email'))
                            <div class="error mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div>
                        <label for="subject"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                        <input type="text"
                               id="subject"
                               name="subject"
                               maxlength="190"
                               class="block p-3 w-full text-sm text-gray-900 rounded border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                               placeholder="Let us know how we can help you" required>
                        @if($errors->has('subject'))
                            <div class="error mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('subject') }}</div>
                        @endif
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                            Your message
                        </label>
                        <textarea id="message"
                                  name="message"
                                  rows="6"
                                  maxlength="2000"
                                  class="block p-2.5 w-full text-sm text-gray-900 rounded shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="Leave a comment..."></textarea>
                        @if($errors->has('message'))
                            <div class="error mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('message') }}</div>
                        @endif
                    </div>
                    <input type="hidden" name="token" value="{{$token}}"/>
                    @if($errors->has('token'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                             role="alert">
                            {{ $errors->first('token') }}
                        </div>
                    @endif
                    <div>
                        {!! htmlFormSnippet() !!}
                        @if($errors->has('g-recaptcha-response'))
                            <div class="error mt-2 text-sm text-red-600 dark:text-red-500">{{ $errors->first('g-recaptcha-response') }}</div>
                        @endif
                    </div>
                    <button type="submit"
                            class="w-full text-white px-4 py-3 bg-gray-900 hover:bg-gray-800 text-white capitalize font-semibold rounded">
                        Send message
                    </button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @push('recaptcha')
        {!! htmlScriptTagJsApi(['action'=>'business.login']) !!}
    @endpush
</section>