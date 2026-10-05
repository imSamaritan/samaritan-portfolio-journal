<?php
$base = rtrim($appUrl ?? '', '/');
?>
<section class="hero is-small is-dark">
    <div class="hero-body">
        <div class="container">
            <span class="tag is-primary is-light is-medium mb-3">Software Craftsman &amp; Creator</span>
            <h1 class="title is-1 about-hero-title">About Me</h1>
            <p class="subtitle is-4 has-text-grey-light about-hero-subtitle">Self-taught full-stack developer, software craftsman &amp; open source enthusiast.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns is-variable is-8 is-align-items-start">
            <!-- Left Column: Portrait Avatar & Quick Info -->
            <div class="column is-4-desktop is-12-tablet">
                <div class="about-avatar-card mb-5">
                    <div class="about-avatar-frame">
                        <img src="<?= $base ?>/assets/about-avatar.png" 
                             alt="Samaritan - Developer Portrait" 
                             class="about-avatar-img">
                    </div>
                    <div class="about-avatar-badge">
                        <span>🇿🇦 Mtubatuba, South Africa</span>
                    </div>
                </div>

                <div class="columns is-multiline mt-4">
                    <div class="column is-12-mobile is-12-tablet mb-1">
                        <div class="about-stat-card">
                            <p class="is-size-7 has-text-grey has-text-weight-semibold is-uppercase mb-1">Status</p>
                            <p class="is-size-5 has-text-weight-bold has-text-primary">🟢 Available for Projects</p>
                        </div>
                    </div>
                    <div class="column is-12-mobile is-12-tablet mb-1">
                        <div class="about-stat-card">
                            <p class="is-size-7 has-text-grey has-text-weight-semibold is-uppercase mb-1">Specialty</p>
                            <p class="is-size-5 has-text-weight-bold">⚡ Full-Stack &amp; PWAs</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Biography, Philosophy & Stack -->
            <div class="column is-8-desktop is-12-tablet">
                <div class="content about-content">
                    <!-- Bio Introduction Block -->
                    <div class="mb-6">
                        <h2 class="title is-2 mb-3">Hello! I'm Samaritan 👋</h2>
                        <p class="about-lead-text mb-4">
                            A passionate, self-taught full-stack web developer based in Mtubatuba, KwaZulu-Natal, South Africa.
                        </p>
                        <p>
                            My path in software engineering has been fueled by deep curiosity, relentless hands-on experimentation, and a drive to build real-world tools that make a difference. I specialize in designing and engineering high-performance web applications and Progressive Web Apps (PWAs) that load blazingly fast, work effortlessly across all screen sizes, and remain dependable even on unstable or offline mobile connections.
                        </p>
                    </div>

                    <!-- Development Philosophy Block -->
                    <div class="mb-6">
                        <h3 class="title is-3 mb-4">🛠️ Development Philosophy</h3>
                        <div class="columns is-multiline">
                            <div class="column is-6">
                                <div class="about-block-card">
                                    <div class="is-flex is-align-items-center mb-2">
                                        <span class="is-size-4 mr-2">⚡</span>
                                        <h4 class="title is-5 mb-0">Lean &amp; Bloat-Free</h4>
                                    </div>
                                    <p class="is-size-6 has-text-grey">
                                        Modern web tooling often introduces immense complexity and heavy bundle sizes. I focus on lean architectures — pairing lightweight frameworks like Slim PHP with Bulma CSS and reactive micro-libraries like Alpine.js and SolidJS to keep memory footprints low and responsiveness instant.
                                    </p>
                                </div>
                            </div>
                            <div class="column is-6">
                                <div class="about-block-card">
                                    <div class="is-flex is-align-items-center mb-2">
                                        <span class="is-size-4 mr-2">📱</span>
                                        <h4 class="title is-5 mb-0">Offline-First &amp; PWA</h4>
                                    </div>
                                    <p class="is-size-6 has-text-grey">
                                        Web applications should never break when the network falters. By implementing Progressive Web App standards with background Service Worker precaching and smart data persistence, users get an app-like installation that functions seamlessly everywhere.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Technical Toolkit Block -->
                    <div class="mb-6">
                        <h3 class="title is-3 mb-4">💻 Technical Toolkit</h3>
                        <div class="columns is-multiline">
                            <!-- Backend & Databases -->
                            <div class="column is-12">
                                <div class="about-block-card mb-4">
                                    <div class="is-flex is-align-items-center mb-3">
                                        <span class="is-size-5 mr-2">🗄️</span>
                                        <h4 class="title is-5 mb-0">Backend &amp; Databases</h4>
                                    </div>
                                    <p class="is-size-6 has-text-grey mb-3">
                                        Robust server-side architectures, RESTful API design, database modeling, and dependency management:
                                    </p>
                                    <div class="about-tech-group">
                                        <span class="tag is-primary is-light is-medium">PHP 8.x</span>
                                        <span class="tag is-info is-light is-medium">Slim Framework 4</span>
                                        <span class="tag is-success is-light is-medium">Node.js</span>
                                        <span class="tag is-link is-light is-medium">MySQL</span>
                                        <span class="tag is-light is-medium">RESTful APIs</span>
                                        <span class="tag is-light is-medium">Composer &amp; PSR Standards</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Frontend & Reactive Interfaces -->
                            <div class="column is-12">
                                <div class="about-block-card mb-4">
                                    <div class="is-flex is-align-items-center mb-3">
                                        <span class="is-size-5 mr-2">🎨</span>
                                        <h4 class="title is-5 mb-0">Frontend &amp; Reactive UI</h4>
                                    </div>
                                    <p class="is-size-6 has-text-grey mb-3">
                                        Crafting semantic, accessible, mobile-first interfaces with intuitive reactivity and light weight:
                                    </p>
                                    <div class="about-tech-group">
                                        <span class="tag is-primary is-light is-medium">Alpine.js</span>
                                        <span class="tag is-info is-light is-medium">SolidJS</span>
                                        <span class="tag is-warning is-light is-medium">JavaScript (ES6+)</span>
                                        <span class="tag is-success is-light is-medium">Bulma CSS</span>
                                        <span class="tag is-light is-medium">Boxicons</span>
                                        <span class="tag is-light is-medium">Semantic HTML5 / CSS3</span>
                                    </div>
                                </div>
                            </div>

                            <!-- DevOps, PWA & Performance -->
                            <div class="column is-12">
                                <div class="about-block-card">
                                    <div class="is-flex is-align-items-center mb-3">
                                        <span class="is-size-5 mr-2">⚙️</span>
                                        <h4 class="title is-5 mb-0">DevOps, Architecture &amp; PWA</h4>
                                    </div>
                                    <p class="is-size-6 has-text-grey mb-3">
                                        End-to-end tooling, version control, offline caching, and server hosting configurations:
                                    </p>
                                    <div class="about-tech-group">
                                        <span class="tag is-dark is-medium">Git &amp; GitHub</span>
                                        <span class="tag is-info is-light is-medium">PWA &amp; Service Workers</span>
                                        <span class="tag is-primary is-light is-medium">Apache &amp; VirtualHosts</span>
                                        <span class="tag is-light is-medium">Performance Optimization</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Community & Digital Garden Block -->
                    <div class="about-community-callout mb-6">
                        <div class="is-flex is-align-items-center mb-3">
                            <span class="is-size-4 mr-2">🌐</span>
                            <h3 class="title is-4 mb-0">Community &amp; Open Knowledge</h3>
                        </div>
                        <p class="is-size-6 mb-3">
                            I am a strong advocate for learning in public and contributing back to the global developer collective. You'll find me engaging with fellow engineers across <strong>DEV Community</strong>, <strong>Stack Overflow</strong>, <strong>Reddit</strong>, and <strong>X</strong>.
                        </p>
                        <p class="is-size-6 mb-0">
                            I also maintain a personal everyday journal right here on this website — documenting real-world code experiments, architectural patterns, and honest reflections on life as an independent creator.
                        </p>
                    </div>

                    <!-- Action / Navigation Buttons Block -->
                    <div class="buttons is-flex-wrap-wrap mt-5">
                        <a href="<?= $base ?>/projects" class="button is-primary is-medium">
                            <span class="mr-2">💼</span>
                            <span>View Projects</span>
                        </a>
                        <a href="<?= $base ?>/journal" class="button is-light is-outlined is-medium">
                            <span class="mr-2">✍️</span>
                            <span>Read Journal</span>
                        </a>
                        <a href="<?= $base ?>/contact" class="button is-info is-outlined is-medium">
                            <span class="mr-2">📫</span>
                            <span>Get in Touch</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
