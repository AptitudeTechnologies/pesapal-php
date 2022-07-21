
function sumPrimes(num) {
      let sum = 0;
      for (let i = 2; i <= num; i++) {
            count=0;
            for (let j = 2; j <= i; j++) {
                  if (i % j === 0) {
                        count++;
                  }
            }
            if (count === 1) {
                  sum += i;
            }
      }
}
    


sumPrimes(977)