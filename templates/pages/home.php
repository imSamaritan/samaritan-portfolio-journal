<section class="hero is-medium is-dark">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="is-flex is-justify-content-center mb-4">
                <div class="hero-avatar-wrapper">
                    <img src="<?= rtrim($appUrl ?? '', '/') ?>/assets/logo.png" alt="Developer Avatar" class="hero-avatar">
                </div>
            </div>
            <span class="tag is-primary is-light is-medium mb-3">Portfolio & Personal Journal</span>
            <h1 class="title is-1">Welcome to My Digital Garden</h1>
            <p class="subtitle is-4 has-text-grey-light">Showcasing my engineering work, creative projects, and everyday thoughts.</p>
            <div class="buttons is-centered mt-4">
                <a href="<?= rtrim($appUrl ?? '', '/') ?>/projects" class="button is-primary is-medium">View Projects</a>
                <a href="<?= rtrim($appUrl ?? '', '/') ?>/journal" class="button is-light is-outlined is-medium">Read Journal</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns is-multiline">
            <div class="column is-4">
                <div class="card">
                    <div class="card-content">
                        <p class="title is-5">💼 Projects</p>
                        <p class="content">Explore selected web applications, APIs, and client projects built with modern tools.</p>
                        <a href="<?= rtrim($appUrl ?? '', '/') ?>/projects" class="has-text-primary has-text-weight-semibold">Explore showcase &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card">
                    <div class="card-content">
                        <p class="title is-5">✍️ Everyday Journal</p>
                        <p class="content">Personal blog sharing daily experiences, lessons learned, and developer thoughts.</p>
                        <a href="<?= rtrim($appUrl ?? '', '/') ?>/journal" class="has-text-primary has-text-weight-semibold">Read entries &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="column is-4">
                <div class="card">
                    <div class="card-content">
                        <p class="title is-5">📫 Get in Touch</p>
                        <p class="content">Have a question or looking to collaborate? Drop me a direct message via the contact form.</p>
                        <a href="<?= rtrim($appUrl ?? '', '/') ?>/contact" class="has-text-primary has-text-weight-semibold">Send a message &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
