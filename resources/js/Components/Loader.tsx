// resources/js/Components/Loader.tsx

import React from 'react';

const Loader: React.FC = () => {
  return (
    <div className="loader">
      {/* Replace with your loader animation */}
      <svg className="animate-spin h-5 w-5 text-blue-500 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
        <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A8.001 8.001 0 0112 4.472v3.09a4.001 4.001 0 00-4 4h3.09a7.963 7.963 0 01-3.09-1.181zm7.603-9.764a4.001 4.001 0 00-4 4H7.91a7.963 7.963 0 013.09 1.181 8.001 8.001 0 018.001 8.001V19.53c2.627 0 8-5.373 8-12h-4a8 8 0 01-8 8v-4z"></path>
      </svg>
    </div>
  );
};

export default Loader;
