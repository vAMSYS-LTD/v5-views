<!-- Footer Start -->
<footer class="footer h-16 flex items-center px-6 bg-white shadow dark:bg-gray-800 mt-auto">
    <div class="flex md:justify-between justify-center w-full gap-4">
        <div>
            {{ \Carbon\Carbon::now()->format('Y') }}© <a href="https://vamsys.co.uk/" target="_blank">vAMSYS LTD</a>
        </div>
        <div class="md:flex hidden gap-4 item-center md:justify-end">
            <span class="text-sm leading-5 text-zinc-600 dark:text-zinc-400">
                Served by: {{ gethostname() }}
            </span>
            <a href="https://vamsys.dev" target="_blank" class="class=text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">
                v5.0.8
            </a>
{{--            <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Support</a>--}}
{{--            <a href="javascript: void(0);" class="text-sm leading-5 text-zinc-600 transition hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white">Contact Us</a>--}}
        </div>
    </div>
</footer>
<!-- Footer End -->
