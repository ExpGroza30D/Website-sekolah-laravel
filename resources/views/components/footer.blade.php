<!-- Footer -->
<footer class="bg-gradient-to-b from-blue-900 to-blue-950 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Announcements -->
            @include('.footer.announcements')

            <!-- School Info -->
            @include('.footer.school-info')

            <!-- Quick Links -->
            @include('.footer.quick-links')

            <!-- Visitor Stats & Social Media -->
            @include('.footer.visitor-stats')
        </div>

        <!-- Copyright -->
        @include('.footer.copyright')
    </div>
</footer>