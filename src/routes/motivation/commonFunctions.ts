
export function checkForm(formData: FormData) {
  let valid = true;

  for (const pair of formData.entries()) {
    const key = pair[0];
    const value = pair[1];
    if (value.toString().trim().length === 0) {
      valid = false;
    } else if (key.trim().toLowerCase().includes('file')) {
        const allowedExtensions = [
            'jpg',
            'jpeg',
            'png',
            'gif',
            'webp',
            'svg',
          ];
          
      const splitName = value?.name.split('.')
      const fileExtension = splitName[splitName.length-1]
      console.log('the extension is ', fileExtension)
      if (!allowedExtensions.includes(fileExtension)) {
        valid = false;
      }
    }
  }
  return valid;
}
