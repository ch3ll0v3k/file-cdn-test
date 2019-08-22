##### Collector

-----

##### Local server

```bash
toor@abi:collector.php$ php -S 0.0.0.0:9000
PHP 7.0.33-0+deb9u3 Development Server started at Thu Aug 22 07:23:52 2019
Listening on http://0.0.0.0:9000
Document root is /m-sys/prog/php/ura-yourga/collector.php
Press Ctrl-C to quit.

[Thu Aug 22 07:23:55 2019] 127.0.0.1:46488 [200]: /
[Thu Aug 22 07:23:55 2019] 127.0.0.1:46490 [200]: /cdn/js/jquery/3.3.1/jquery.min.js
[Thu Aug 22 07:23:55 2019] 127.0.0.1:46494 [200]: /cdn/js/less/2.7.2/less.min.js
[Thu Aug 22 07:23:55 2019] 127.0.0.1:46492 [200]: /cdn/js/popper/1.14.7/popper.min.js
[Thu Aug 22 07:23:55 2019] 127.0.0.1:46496 [200]: /cdn/js/bootstrap/4.3.1/bootstrap.min.js
```
-----

##### Tests
```bash

toor@abi:collector.php$ php -f tests.php 

<script src="http://0.0.0.0:9000/cdn/js/jquery/3.3.1/jquery.min.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/jquery/3.3.1/jquery.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/popper/1.14.7/popper.min.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/popper/1.14.7/popper.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/less/2.7.2/less.min.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/less/2.7.2/less.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/bootstrap/4.3.1/bootstrap.min.js"></script>
<script src="http://0.0.0.0:9000/cdn/js/bootstrap/4.3.1/bootstrap.js"></script>
<link href="http://0.0.0.0:9000/cdn/css/bootstrap/4.3.1/bootstrap.min.css"/>
<link href="http://0.0.0.0:9000/cdn/css/bootstrap/4.3.1/bootstrap.css"/>
```
-----

##### Tree after tests
```bash
toor@abi:collector.php$ tree -I .git
.
├── cdn
│   ├── css
│   │   └── bootstrap
│   │       └── 4.3.1
│   │           ├── bootstrap.css
│   │           └── bootstrap.min.css
│   └── js
│       ├── bootstrap
│       │   └── 4.3.1
│       │       ├── bootstrap.js
│       │       └── bootstrap.min.js
│       ├── ckan
│       │   └── 0.2.3
│       ├── jquery
│       │   └── 3.3.1
│       │       ├── jquery.js
│       │       └── jquery.min.js
│       ├── less
│       │   └── 2.7.2
│       │       ├── less.js
│       │       └── less.min.js
│       ├── popper
│       │   └── 1.14.7
│       │       ├── popper.js
│       │       └── popper.min.js
│       └── vue-chartjs
│           └── 3.4.2
├── collector.php
├── index.php
├── README.md
└── tests.php
```
