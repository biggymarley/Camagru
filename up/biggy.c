#include <unistd.h>

int ft_strlen(char *str)
{
    int i = 0;
    if (str)
    {
        while (str[i])
            i++;
    }
    return (i);
}

int checktable(int ac, char **av)
{
    int i = 1;
    ac = ac - 1;
    while (av[i])
    {
        if (ft_strlen(av[i]) != ac)
            return (0);
        i++;
    }
    return (1);
}

int pion(char **av, int line, int col)
{
    if ((av[line - 1][col + 1] && av[line - 1][col + 1] == 'K') || (av[line - 1][col - 1] && av[line - 1][col - 1] == 'K'))
        return (1);
    return (0);
}

int rook(char **av, int line, int col, int size)
{
    int i = line;
    int j = col;
    //up
    i--;
    while (i >= 1)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        i--;
    }
    i = line;
    j = col;
    // down
    i++;
    while (i <= size)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        i++;
    }
    i = line;
    j = col;
    // right
    j++;
    while (j <= size)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        j++;
    }
    i = line;
    j = col;
    // left
    j--;
    while (j >= 0)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        j--;
    }
    return (0);
}

int bishop(char **av, int line, int col, int size)
{
    int i = line;
    int j = col;

    //up-right
    i++;
    j++;
    while (i <= size && j <= size)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        i++;
        j++;
    }
    // up left
    i = line;
    j = col;
    i++;
    j--;
    while (i <= size && j >= 0)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        i++;
        j--;
    }
    //down left
    i = line;
    j = col;
    i--;
    j--;
    while (i >= 1 && j >= 0)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        i--;
        j--;
    }
    //down roght
    i = line;
    j = col;
    i--;
    j++;
    while (i >= 1 && j <= size)
    {
        if (av[i][j] == 'K')
            return (1);
        else if (av[i][j] == 'R' || av[i][j] == 'B' || av[i][j] == 'P' || av[i][j] == 'Q')
            break;
        i--;
        j++;
    }
    return (0);
}

int cmate(char **av, int ac)
{
    int i = 1;
    int j = 0;

    if (checktable(ac, av))
    {
        int size = ft_strlen(av[i]);
        while (av[i])
        {
            j = 0;
            while (av[i][j])
            {
                if (av[i][j] == 'P')
                    if (pion(av, i, j))
                        return (1);
                if (av[i][j] == 'R')
                    if (rook(av, i, j, size))
                        return (1);
                if (av[i][j] == 'B')
                    if (bishop(av, i, j, size))
                        return (1);
                if (av[i][j] == 'Q')
                    if (rook(av, i, j, size) || bishop(av, i, j, size))
                        return (1);
                j++;
            }
            i++;
        }
    }
    return (0);
}

int main(int ac, char **av)
{
    if (ac != 1)
    {
        if (cmate(av, ac))
            write(1, "Success", 7);
        else
            write(1, "Fail", 4);
    }
    write(1, "\n", 1);
}
