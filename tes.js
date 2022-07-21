// find the sum of all prime numbers between 2 and 977
function sumPrimes(num) {
  let sum = 0;
  for (let i = 2; i < num; i++) {
    //custom function to check if number is prime
      if (isPrime(i)) {
        sum += i;
  }
  }
  return sum;
}

//testif a big number is prime using math f
function isPrime(num) {
      if (num < 2) {
      return false;
      }
      for (let i = 2; i < num; i++) {
      if (num % i === 0) {
            return false;
      }
      }
      return true;
      }
//test if a big number is prime using math.sqrt
function isPrime(num) {
      if (num < 2) {
      return false;
      }
      for (let i = 2; i < Math.sqrt(num); i++) {
      if (num % i === 0) {
            return false;
      }
      }
      return true;
      }
