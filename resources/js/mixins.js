import { mapActions } from "vuex";
import axios from "axios";
export default {
    methods: {
        ...mapActions({
          upImg: "upload/uploadImage"
        }),
        async uploadFile(set) {
          console.log("uploadfile start");
          console.log(set);
          if (set.file) {
            const config = {
              headers: { "content-type": "multipart/form-data" }
            };
            let formData = new FormData();
            formData.append("file", set.file);
            formData.append("path", set.path);
            const { data } = await axios.post("/api/uploadFile", formData, config);
            return data;
          } else {
            return null;
          }
        }
}
}