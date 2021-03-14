const pinataApiKey = "707f8bd89c7c518c0266";
const pinataSecretApiKey = "528f99ac4388f7aaf2cbedcd52806bc7ef1c5daf4d62c94b225406cdc1e6c153";
const axios = require("axios");
const fs = require("fs");
const FormData = require("form-data");
const pinFileToIPFS = async () => {
    const url = `https://api.pinata.cloud/pinning/pinFileToIPFS`;
    let data = new FormData();
    data.append("file", fs.createReadStream("./ProjectileTextureSwirly.png"));
    const res = await axios.post(url, data, {
        maxContentLength: "Infinity",
        headers: {
            "Content-Type": `multipart/form-data; boundary=${data._boundary}`,
            pinata_api_key: pinataApiKey,
            pinata_secret_api_key: pinataSecretApiKey,
        },
    });
    console.log(res.data);
};
pinFileToIPFS();