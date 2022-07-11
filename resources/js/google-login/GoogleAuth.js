let auth2;
let loadingPromise;

const createScript = () => {
    return new Promise((resolve, reject) => {
        const el = document.getElementById('auth2_script_id');
        if (!el) {
            let gplatformScript = document.createElement('script')
            gplatformScript.setAttribute('src', 'https://accounts.google.com/gsi/client')
            gplatformScript.setAttribute("async", true)
            gplatformScript.setAttribute("defer", "defer")
            gplatformScript.setAttribute("id", "auth2_script_id")
            document.head.appendChild(gplatformScript);
        }
        resolve();
    });

}

const onGapiLoadPromise = (params) => {
    return new Promise((resolve, reject) => {
        window.onGoogleLibraryLoad = function () {
            auth2 = google.accounts.id.initialize(
                Object.assign({}, params)
            );
            // google.accounts.id.renderButton(
            //     document.getElementById("google-signin-btn-0"),
            //     { theme: 'outline', size: 'large' }
            // );
            resolve(auth2);
            // google.accounts.id.prompt();
          };

        // window.onGapiLoad = () => {
        //     window.gapi.load('auth2', () => {
        //         try {
        //             auth2 = window.gapi.client.init(
        //                 Object.assign({}, params)
        //             );
        //         } catch (err) {
        //             console.log(err);
        //             reject({ err: 'client_id missing or is incorrect, or if you added extra params maybe they are written incorrectly, did you add it to the component or plugin?' })
        //         }
        //         resolve(auth2);
        //     })
        // }
    })
}

const loadingAuth2 = (params) => {
    if (auth2) {
        return Promise.resolve(auth2);
    } else {
        if (!loadingPromise)
            loadingPromise = onGapiLoadPromise(params);
        return loadingPromise;
    }
}

const load = (params) => {
    return Promise.all(
        [loadingAuth2(params), createScript()])
        .then(results => {
            return results[0];
        });
}

export default {
    load
}
