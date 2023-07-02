let board = ['', '', '', '', '', '', '', '', ''];
let currentPlayer = 'X';
let gameStatus = 'ongoing';

const cells = document.getElementsByClassName('cell');
const status = document.getElementById('status');

for (let i = 0; i < cells.length; i++) {
    cells[i].addEventListener('click', function () {
        if (gameStatus === 'ongoing' && board[i] === '') {
            board[i] = currentPlayer;
            cells[i].innerHTML = currentPlayer;
            cells[i].classList.add(currentPlayer);

            if (checkWin(currentPlayer)) {
                gameStatus = currentPlayer === 'X' ? 'player_X_win' : 'player_O_win';
                status.innerHTML = currentPlayer + ' wins!';
                status.classList.add('win');
            } else if (board.filter(cell => cell === '').length === 0) {
                gameStatus = 'draw';
                status.innerHTML = 'Draw!';
                status.classList.add('draw');
            } else {
                currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
            }
        }
    });
}

function reset() {
    board = ['', '', '', '', '', '', '', '', ''];
    currentPlayer = 'X';
    gameStatus = 'ongoing';
    status.innerHTML = '';
    status.classList.remove('win', 'draw');

    for (let i = 0; i < cells.length; i++) {
        cells[i].innerHTML = '';
        cells[i].classList.remove('X', 'O');
    }
}

function checkWin(player) {
    const winPatterns = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8], // Baris
        [0, 3, 6], [1, 4, 7], [2, 5, 8], // Kolom
        [0, 4, 8], [2, 4, 6] // Diagonal
    ];

    for (let pattern of winPatterns) {
        const [a, b, c] = pattern;
        if (board[a] === player && board[b] === player && board[c] === player) {
            return true;
        }
    }

    return false;
}
