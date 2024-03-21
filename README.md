# WordPress SSRF Demo Playground

This is a repository that contains the vulnerable WordPress docker instance and the exploit script to play around and test with.

The full research article of this repo can be found here (Patchstack link).

### Installation

1. `git clone https://github.com/dhakalananda/wp-ssrf`
2. `cd wp-ssrf`
3. `docker compose up`

The vulnerable `wp_safe_remote_get()` function is located at `/wp-content/plugins/vulnerable-plugin/index.php`. The `url` parameter takes in the user-input and passes it to the vulnerable function.

### Prerequisite

In order to exploit this, a server with a very low TTL is needed.

Reference: 

[DNS Rebinding Tool](https://github.com/taviso/rbndr)

[Live Tool](https://lock.cmpxchg8b.com/rebinder.html)

### Running the Exploit

To exploit this docker instance, we need the Gateway IP of the container. It might be either `192.168.0.1` or `172.*.0.1`.

However, on a real-world server with WordPress on port 80, and httpd on port 8080 and not exposed to the internet, `127.0.0.1` should work.

1. Get a server that switches between an external IP and gateway IP
2. `python3 exploit.py -t http://TARGET -r http://REBIND_URL`

