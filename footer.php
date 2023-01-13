
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<footer id="colophon" class="site-footer bg-gray-800 text-white py-8" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container text-center text-gray-500 flex-end flex items-end">
        <div class="flex flex-row w-full justify-end items-end space-x-12 font-semibold">
            <a href="/sitemap/" class="text-white">
                Sitemap
            </a>
            <a class="text-white">
                Legal
            </a>
        </div>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
