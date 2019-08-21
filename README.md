##### File-CDN test

```bash
$ php -S 0.0.0.0:8080
```

#### Structure
```bash
/cdn
  /chartjs
    /v1.0.0
      /chartjs.js
      /chartjs.min.js
  /jquery.min.js
    /v1.0.0
      /jquery.js
      /jquery.min.js

```

#### Access
```
http://0.0.0.0:8080/cdn/chartjs/v1.0.0/chartjs.js
http://0.0.0.0:8080/cdn/chartjs/v2.0.0/chartjs.js
http://0.0.0.0:8080/cdn/chartjs/v3.0.0/chartjs.min.js
```
